<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => 'checkAuth'], function () {
    // Login Routes
    Route::get('/login', [AuthController::class, "loginForm"])->name("login.form");
    Route::post('/login', [AuthController::class, "login"])->name("login");

    // Register Routes
    Route::get('/register', [AuthController::class, "registerForm"])->name("register.form");
    Route::post('/register', [AuthController::class, "register"])->name("register");
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/logout',  [AuthController::class, "logout"])->name("logout");

    Route::get('dashboard', [DashboardController::class, "index"])->name('dashboard');
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
});
