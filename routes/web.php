<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/request-info', function() {
    return view('auth.request-info');
});

Route::get('/dashboard', function() {
    return view("admin.dashboard");
});
