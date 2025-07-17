<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('clients/index', function () {
//     return view('clients.index');
// })->name('clients');

// Route::get('users/index', function () {
//     return view('users');
// })->name('users');

// Route::get('tasks/index', function () {
//     return view('tasks');
// })->name('tasks');

// Route::get('projects/index', function () {
//     return view('projects');
// })->name('projects');

Route::resource('projects',ProjectController::class);
Route::resource('tasks',TaskController::class);
Route::resource('users',UserController::class);
Route::resource('clients',ClientController::class);
