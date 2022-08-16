<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\http\Controllers\LoginController;
use App\http\Controllers\HomeController;

Route::group([
    'prefix'        => 'auth',
    'as'            => 'auth-'
], function () {
    Route::get('google/redirect', [LoginController::class, 'googleRedirect'])->name('google');
    Route::get('google/callback', [LoginController::class, 'googleCallback']);
    Route::get('facebook/redirect', [LoginController::class, 'facebookRedirect'])->name('facebook');
    Route::get('facebook/callback', [LoginController::class, 'facebookCallback']);
    Route::get('login', [LoginController::class, 'show'])->name('login');
});
Route::group([
    'middleware'    => 'user'
], function () {
    Route::get('/', [HomeController::class, 'show'])->name('home');
});
