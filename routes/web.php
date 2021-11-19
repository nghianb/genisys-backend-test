<?php

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

Route::resource('/shorten-urls', ShortenUrlController::class)
    ->only('store', 'show');

Route::get('/{hashId}', URLShortenerController::class)
    ->name('url-shortener');