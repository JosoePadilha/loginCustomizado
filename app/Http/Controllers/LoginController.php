<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = "login." . request()->ip();
        return view('login',
            [
                'key' => $key,
                'retries' => RateLimiter::retriesLeft($key, 5),
                'seconds' => RateLimiter::availableIn($key),
            ]
        );
    }

    public function login(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();

        $data = $request->only('email', 'password', 'remember');

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        $remember = empty($data['remember']) ? false : true;

        try {
            if (Auth::attempt($credentials, $remember)) {
                RateLimiter::clear("login." . $request->ip());

                $request->session()->regenerate();

                Session::put('name', Auth::user()->name);
                Session::put('userId', Auth::user()->id);

                $st = "success";
                $message = "Seja bem vindo " . session()->get('name');
                return redirect()->intended('dashboard')->with($st, $message);
            } else {
                if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
                    if (Auth::guard('client')->check()) {
                        RateLimiter::clear("login." . $request->ip());

                        $request->session()->regenerate();

                        Session::put('firstNameUser', Auth::guard('client')->user()->name);
                        Session::put('clientId', Auth::guard('client')->user()->id);

                        $st = "success";
                        $message = "Seja bem vindo " . session()->get('firstNameUser');
                        return redirect()->route('dashboardClient')->with($st, $message);
                    }
                } else {
                    $st = "error";
                    $message = "Verifique os dados informados!!";
                }
                return redirect('/')->with($st, $message);
            }
        } catch (Exception $ex) {
            $st = "error";
            $message = "Não foi possível fazer o login!!";
            return redirect('/')->with($st, $message);
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {

            if (session()->has('userId')) {
                session()->pull('userId');
            }

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            Session::flush();

            Auth::logout();
        } else if (Auth::guard('client')->check()) {

            if (session()->has('clientId')) {
                session()->pull('clientId');
            }

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            Session::flush();

            Auth::guard('client')->logout();
        }

        return redirect('/');
    }
}
