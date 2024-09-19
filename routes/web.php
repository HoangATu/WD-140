<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [AuthController::class, 'showFormLogin']);
Route::get('register', [AuthController::class, 'register']);
Route::get('password_reset', [AuthController::class, 'password_reset']);
