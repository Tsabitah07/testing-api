<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ListController;
use App\Http\Controllers\admin\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/login', [AuthController::class, 'loginView'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    Route::group(['prefix' => 'user'], function(){
        Route::get('/list', [ListController::class, 'index']);
        Route::get('/detail/{id}', [ListController::class, 'show']);
        Route::post('/delete/{id}', [ListController::class, 'destroy']);
    });

    Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function(){
        Route::get('/', [ProfileController::class, 'index']);
        Route::get('/edit', [ProfileController::class, 'edit']);
        Route::post('/update', [ProfileController::class, 'update']);
    });
});
