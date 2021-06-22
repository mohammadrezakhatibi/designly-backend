<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\Content\PostController;
use App\Http\Controllers\API\User\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1'], function () {

    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('login', [RegisterController::class, 'login']);
    
    Route::group(['prefix' => 'user','middleware' => ['auth:api']], function () {
        Route::get('/', [UserController::class, 'getUserInfo'])->name('getUserInfo');
    });
    
    Route::middleware('auth:api')->group(function () {
        Route::get('posts', [PostController::class, 'index'])->name('getPosts');
        Route::get('posts/{id}', [PostController::class, 'getPostBy'])->name('getPostById');
    });
    
});