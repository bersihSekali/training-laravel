<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;

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
    return view('layout/main', [
        'title' => 'Home'
    ]);
}) -> name('home') -> middleware('auth');

Route::get('/login', [LoginController::class, 'index']) -> name('login') -> middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);


Route::get('/register', [RegisterController::class, 'index']) -> name('register') -> middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/logout', [LoginController::class, 'logout']) -> name('logout') -> middleware('auth');

Route::resource('post-category', PostCategoryController::class) -> middleware('auth');
Route::resource('post', PostController::class) -> middleware('auth');