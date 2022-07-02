<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');

    Route::middleware('auth:api')->group(function () {
        Route::get('/user', [\App\Http\Controllers\AuthController::class, 'check'])->name('user.check');

        Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'getarticles'])->name('article.all');
        Route::get('/articles/{article}', [\App\Http\Controllers\ArticleController::class, 'getarticle'])->name('article.get');
        Route::post('/articles', [\App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');
        Route::put('/articles/{article}', [\App\Http\Controllers\ArticleController::class, 'update'])->name('article.update');
        Route::delete('/articles/{article}', [\App\Http\Controllers\ArticleController::class, 'destroy'])->name('article.delete');

        Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'get'])->name('category.get');
        Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
        Route::put('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
        Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
    });
});
