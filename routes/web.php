<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('article', ArticleController::class);
    Route::get('/articles/search', [ArticleController::class,'index'])->name('article.search');
    Route::get('/articles/filter', [ArticleController::class,'index'])->name('article.filter');
    Route::resource('users', UserController::class);
});
