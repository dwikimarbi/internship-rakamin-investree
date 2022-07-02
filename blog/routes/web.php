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

Route::get('/', function(){
    $articles = App\Models\Article::latest()->paginate(2);
    return view('welcome', ['articles' => $articles]);
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/article/tambah', [App\Http\Controllers\ArticleController::class, 'addArticle']);
    Route::post('/article/tambah', [App\Http\Controllers\ArticleController::class, 'postaddArticle']);
    Route::get('/article/update/{id}', [App\Http\Controllers\ArticleController::class, 'updateArticle']);
    Route::post('/article/update/', [App\Http\Controllers\ArticleController::class, 'postupdateArticle']);
    Route::get('/article/delete/{id}', [App\Http\Controllers\ArticleController::class, 'deleteArticle']);
    Route::get('/article/detail/{id}', [App\Http\Controllers\ArticleController::class, 'viewArticle']);
    Route::get('/category/tambah', [App\Http\Controllers\CategoryController::class, 'addCategory']);
    Route::post('/category/tambah', [App\Http\Controllers\CategoryController::class, 'postaddCategory']);
    Route::get('/category/hapus/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory']);
    Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory']);
    Route::post('/category/edit/', [App\Http\Controllers\CategoryController::class, 'postupdateCategory']);
});




// Route::get('/test', [App\Http\Controllers\HomeController::class, 'view']);

