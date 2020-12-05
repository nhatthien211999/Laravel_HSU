<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Tag;
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

// Route::get('/', [UserController::class, 'index']);

Route::get('/users/{user}/create-user',[ProfileController::class, 'createUser'])->name('profiles.createUser');
Route::post('/users/{user}/create-user',[ProfileController::class, 'storeUser'])->name('profiles.storeUser');



Route::resource('users', UserController::class);
Route::resource('profiles', ProfileController::class);

Route::resource('articles', ArticleController::class);




Route::resource('categories', CategoryController::class);


Route::resource('tags', TagController::class);

Route::get('/categories/{category}/create-tag',[TagController::class, 'createUser'])->name('categories.createTag');

Route::post('/categories/{category}/create-tag',[TagController::class, 'storeUser'])->name('categories.storeTag');

Route::get('/users/{user}/articles',[ArticleController::class, 'indexShopCart'])->name('articles.indexShopCart');

Route::get('/users/{user}/articles/{article}',[ArticleController::class, 'showTag'])->name('articles.showTag');

Route::get('/users/{user}/create-articles',[ArticleController::class, 'createArticle'])->name('articles.createArticle');
Route::post('/users/{user}/create-articles',[ArticleController::class, 'storeArticle'])->name('articles.storeArticle');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
