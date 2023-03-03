<?php

use App\Http\Controllers\HotelSerchController;
use App\Http\Controllers\InfomationController;
use App\Http\Controllers\Search;
use App\Http\Controllers\SearchController;
use Aws\Middleware;
use App\Http\Controllers\AuthHotelSreachController;
use App\Http\Controllers\AuthSreachController;
use App\Http\Controllers\AuthInformationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SitemapController;
use Doctrine\DBAL\Schema\Index;
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
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/', App\Http\Controllers\InfomationController::class)->only('index');
Route::resource('/info', App\Http\Controllers\InfomationController::class)->except('index');
Route::get('hotel', [App\Http\Controllers\HotelSerchController::class, 'index'])->name('hotel');
Route::get('hotel/show/{middleArea}/{smallArea}', [App\Http\Controllers\HotelSerchController::class, 'show'])->name('hotel.show')->middleware();
Route::get('hotel/search/{kindOf}/{key}', [App\Http\Controllers\SearchController::class,'SearchGenre'])->name('search')->middleware();
Route::resource('favorite',FavoriteController::class)->middleware('verified');
Route::get('user/edit', [UserController::class,'edit'])->name('user.edit')->middleware('verified');
Route::put('user/update', [UserController::class,'update'])->name('user.update')->middleware('verified');
//siteMap
Route::get('/sitemap', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');
