<?php

use App\Http\Controllers\HotelSerchController;
use App\Http\Controllers\InfomationController;
use App\Http\Controllers\Search;
use App\Http\Controllers\SearchController;
use Aws\Middleware;
use App\Http\Controllers\AuthHotelSreachController;
use App\Http\Controllers\AuthSreachController;
use App\Http\Controllers\AuthInformationController;
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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/info', App\Http\Controllers\InfomationController::class);
Route::get('hotel', [App\Http\Controllers\HotelSerchController::class, 'index'])->name('hotel');
Route::get('hotel/show/{middleArea}/{smallArea}', [App\Http\Controllers\HotelSerchController::class, 'show'])->name('hotel.show')->middleware();
Route::get('hotel/search/{kindOf}/{key}', [App\Http\Controllers\SearchController::class,'SearchGenre'])->name('search')->middleware();
