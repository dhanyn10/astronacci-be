<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\http\Controllers\RegisterController;
use App\http\Controllers\LoginController;
use App\http\Controllers\LogoutController;
use App\http\Controllers\HomeController;

Route::group([
    'prefix'        => 'auth',
    'as'            => 'auth-'
], function () {
    Route::get('google/redirect', [LoginController::class, 'googleRedirect'])->name('google');
    Route::get('google/callback', [LoginController::class, 'googleCallback']);
    Route::get('facebook/redirect', [LoginController::class, 'facebookRedirect'])->name('facebook');
    Route::get('facebook/callback', [LoginController::class, 'facebookCallback']);
    Route::get('register', [RegisterController::class, 'show'])->name('register');
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::get('logout', [LogoutController::class, 'show'])->name('logout');
});
Route::group([
    'middleware'    => 'user'
], function () {
    Route::get('/', [HomeController::class, 'show'])->name('home');
});
