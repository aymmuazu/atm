<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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
    return view('home');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');

Route::prefix('user')->group(function () {
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile')->middleware('auth');;
    Route::post('/profile', [DashboardController::class, 'storeprofile'])->middleware('auth');

    Route::get('/password', [DashboardController::class, 'password'])->name('password')->middleware('auth');
    Route::post('/password', [DashboardController::class, 'storepassword'])->middleware('auth');

    Route::get('/map', [DashboardController::class, 'map'])->name('map')->middleware('auth');
    Route::get('/parameters', [DashboardController::class, 'parameters'])->name('parameters')->middleware('auth');
});
