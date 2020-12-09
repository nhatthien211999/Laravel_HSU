<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CartController;
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

Route::resource('carts', CartController::class);




Route::resource('categories', CategoryController::class);


Route::resource('tags', TagController::class);

Route::get('/categories/{category}/create-tag',[TagController::class, 'createTag'])->name('tags.createTag');

Route::post('/categories/{category}/create-tag',[TagController::class, 'storeTag'])->name('tags.storeTag');

Route::get('/users/{user}/carts',[CartController::class, 'indexShopCart'])->name('carts.indexShopCart');

Route::get('/users/{user}/carts/{cart}',[CartController::class, 'showTag'])->name('carts.showTag');

Route::get('/users/{user}/create-carts',[CartController::class, 'createCart'])->name('carts.createCart');
Route::post('/users/{user}/create-carts',[CartController::class, 'storeCart'])->name('carts.storeCart');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
