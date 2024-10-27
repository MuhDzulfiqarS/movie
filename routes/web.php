<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FavoriteMovieController;

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

Route::get('/', function () {
    return view('login.view_login');
});

Route::get('main1',[MovieController::class,'index'])->middleware('auth');
Route::get('/main1/{id}', [MovieController::class, 'show'])->middleware('auth');

Route::post('/favorites', [FavoriteMovieController::class, 'store'])->middleware('auth');
Route::get('/favorites', [FavoriteMovieController::class, 'index'])->middleware('auth');
Route::delete('/favorites/{id}', [FavoriteMovieController::class, 'destroy'])->middleware('auth');

Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout','logout');
});

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});



