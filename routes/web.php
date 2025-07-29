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

Route::get('/donation-record', function() {
    return view("admin.donors.donation-record");
});

Route::get('/test', function() {
    return view("admin.donors.test");
});
Route::get('/donor-show', function() {
    return view("admin.donors.donor-show");
});
Route::get('/donor-show/approved', function() {
    return redirect()->back()->with('status', 'success');
});
Route::get('/blood-inventory', function() {
    return view("admin.blood-inventory");
});
Route::get('/dashboard', function() {
    return view("admin.dashboard");
});
Route::get('/profile', function() {
    return view("admin.profile");
});