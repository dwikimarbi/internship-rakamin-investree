<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/articles/my_article', [ArticleController::class, 'showMyArticles'])->name('my_article');

// Route::resources([
//     'articles' => ArticleController::class,
//     'categories' => CategoryController::class,
// ]);
