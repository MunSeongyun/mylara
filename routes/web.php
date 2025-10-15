<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Actions\UserIndexAction;
use App\Http\Controllers\TestRequestController;
use App\Http\Controllers\ResponseDemoController;


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

Route::get('/request-test', [TestRequestController::class, 'create'])
->name('request.create');

Route::post('/request-test', [TestRequestController::class, 'store'])
->name('request.store');

Route::prefix('response-demo')->group(function () {
    Route::get('/string', [ResponseDemoController::class, 'string'])->name('string');
    Route::get('/view', [ResponseDemoController::class, 'view'])->name('view');
    Route::get('/json', [ResponseDemoController::class, 'json'])->name('json');
    Route::get('/download', [ResponseDemoController::class, 'download'])->name('download');
    Route::get('/redirect', [ResponseDemoController::class, 'redirect'])->name('redirect');
    Route::get('/redirect-target', [ResponseDemoController::class, 'redirectTarget'])->name('redirect-target');
});
