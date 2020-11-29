<?php

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

Route::get('/', [UserController::class, 'index']);

Route::get('/users/{user}/storeUser',[ProfileController::class, 'createUser'])->name('profiles.createUser');
Route::post('/users/{user}/storeUser',[ProfileController::class, 'storeUser'])->name('profiles.storeUser');



Route::resource('users', UserController::class);
Route::resource('profiles', ProfileController::class);




Route::resource('categories', CategoryController::class);


Route::resource('tags', TagController::class);

Route::get('/categories/{category}/createTag',[TagController::class, 'createUser'])->name('categories.createTag');
Route::post('/categories/{category}/storeTag',[TagController::class, 'storeUser'])->name('categories.storeTag');