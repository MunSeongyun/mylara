<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Actions\UserIndexAction;

Route::get('/', function () {
    dd('Welcome to Laravel');
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [App\Http\Controllers\LoginController::class,'index'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [App\Http\Controllers\LoginController::class,'authenticate'])
    ->middleware('guest');
    
Route::get('/logout', [App\Http\Controllers\LoginController::class,'logout'])
    ->middleware('auth')
    ->name('logout');


// Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'getTasks']);
// Route::post('/tasks', 'App\Http\Controllers\AddTaskAction');



Route::get('/user', [UserController::class, 'index']);

Route::post('/user', [UserController::class, 'store']);

Route::get('/users', UserIndexAction::class);

Route::get('/layered/user/{id}', [App\Http\Controllers\Layered\UserController::class, 'index']);