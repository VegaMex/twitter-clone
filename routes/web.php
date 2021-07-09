<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::inertia('/', 'MainPage');

// Login

Route::get('/login', function () { return Inertia::Render('Login', []); })
    ->name('login')
    ->middleware('guest');

Route::post('/login', [UserController::class, 'login']);

// Register

Route::get('/register', function () {
    return Inertia::Render('Register', []);
});

Route::post('/register', [UserController::class, 'store'])
    ->name('user.store');

// Home

Route::get('/home', [HomeController::class, 'index'])
    ->name('home.index')
    ->middleware('auth');
