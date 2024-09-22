<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function() {
    return 'đây là trang chủ';
});
Route::get('/admin', function() {
    return view('admins.danhmucs.index');
});
Route::get('/login',           [AuthController::class, 'showFormLogin']);
Route::post('/login',          [AuthController::class, 'login'])->name('login');
Route::get('/register',        [AuthController::class, 'showFormRegister']);
Route::post('/register',       [AuthController::class, 'register'])->name('register');
Route::get('/password_reset',  [AuthController::class, 'password_reset']);
Route::post('/logout',         [AuthController::class, 'logout'])->name('logout');

