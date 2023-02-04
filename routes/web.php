<?php

use App\Http\Controllers\HotelSerchController;
use App\Http\Controllers\InfomationController;
use App\Http\Controllers\Search;
use App\Http\Controllers\SearchController;
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

Route::resource('/info',InfomationController::class);
Route::get('hotel', [HotelSerchController::class, 'index'])->name('hotel');
Route::get('hotel/show/{middleArea}/{smallArea}', [HotelSerchController::class, 'show'])->name('hotel.show');
Route::get('hotel/search/{kindOf}/{key}', [SearchController::class,'SearchGenre'])->name('search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
