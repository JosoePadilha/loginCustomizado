<?php

namespace App\Http\Controllers;

use Exception;

class UserController extends Controller
{
    public function dashboard()
    {
        try {
            return view('dashboard');
        } catch (Exception $ex) {
            $st = "error";
            $message = "Não foi possível acessar a página!!";
            return redirect()->back()->with($st, $message);
        }
    }
    public function dashboardClient()
    {
        try {
            return view('dashboardClient');
        } catch (Exception $ex) {
            $st = "error";
            $message = "Não foi possível acessar a página!!";
            return redirect()->back()->with($st, $message);
        }
    }
}
