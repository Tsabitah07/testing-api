<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\API\BookshelfController;
use App\Http\Controllers\api\OtpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'auth'], function(){
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('refresh-token', [AuthController::class, 'refreshToken'])->middleware('auth:sanctum');
    Route::get('/list-user', [AuthController::class, 'show']);
    Route::post('/send-otp', [OtpController::class, 'sendOtp']);
    Route::post('/verify-otp', [OtpController::class, 'verifyOtp']);

    Route::post('/verify-token', [OtpController::class, 'verifyToken']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('/data-user', [AuthController::class, 'user']);
        Route::post('/edit', [AuthController::class, 'edit']);
        Route::post('/edit-credential', [AuthController::class, 'editCredential']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/delete', [AuthController::class, 'delete']);

        Route::post('update-password', [AuthController::class, 'updatePassword']);
    });

    Route::group(['prefix' => 'bookshelf'], function () {
        Route::post('/', [BookshelfController::class, 'store']);
        Route::get('/', [BookshelfController::class, 'index']);
        Route::put('/', [BookshelfController::class, 'update']);
        Route::delete('/', [BookshelfController::class, 'destroy']);

        Route::get('/category', [BookshelfController::class, 'category']);
    });
});
