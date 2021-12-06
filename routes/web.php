<?php

use App\Http\Controllers\LoginController;
use App\Models\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('index')->middleware('throttle:login');
Route::any('/login', [LoginController::class, 'login'])->name('login');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboardClient', [UserController::class, 'dashboardClient'])->name('dashboardClient');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
