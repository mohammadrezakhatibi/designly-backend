<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\User\UserController;
use App\Http\Controllers\Web\Content\PostController;
use App\Http\Controllers\Web\Content\SourceController;
use App\Http\Controllers\Web\Content\CategoryController;

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

Route::group(['prefix' => 'manager'], function () {
    Route::get('login', [UserController::class, 'index']);
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'manager'], function () {
    Route::middleware('auth:web')->group(function () {
        Route::get('posts', [PostController::class, 'index'])->name('admin.post.list');
        Route::get('posts/add', [PostController::class, 'addIndex'])->name('admin.post.add.index');
        Route::post('posts/add', [PostController::class, 'add'])->name('admin.post.add');


        Route::get('categories', [CategoryController::class, 'index'])->name('admin.category.list');
        Route::get('sources', [SourceController::class, 'index'])->name('admin.source.list');
    });
});

