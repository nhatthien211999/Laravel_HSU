<?php

use App\Http\Controllers\productController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\UserController;
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
Route::patch('/users/{user}/storeUser',[ProfileController::class, 'storeUser'])->name('profiles.storeUser');



Route::resource('users', UserController::class);
Route::resource('profiles', ProfileController::class);

