<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShortenUrlController;
use App\Http\Controllers\URLShortenerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)
    ->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', [LoginController::class, 'show'])
            ->name('login.show');
        Route::post('/', [LoginController::class, 'login'])
            ->name('login');
    });
    
    Route::group(['prefix' => 'register'], function () {
        Route::get('/', [RegisterController::class, 'show'])
            ->name('register.show');
        Route::post('/', [RegisterController::class, 'register'])
            ->name('register');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});

Route::resource('/shorten-urls', ShortenUrlController::class)
    ->only('store', 'show');

Route::get('/{alias}', URLShortenerController::class)
    ->name('url-shortener');