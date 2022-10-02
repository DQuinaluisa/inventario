<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index2'])->name('home');
Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index2'])->name('home.index2');

Auth::routes();
Route::delete('/home/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('home.destroy');
Route::get('createProduct', [CategoryController::class, 'index'])->name('inventary.createProduct');

Route::get('createProducts', [App\Http\Controllers\ProductController::class, 'create'])->name('inventary.createProduct');
Route::post('createProduct', [App\Http\Controllers\ProductController::class, 'store'])->name('inventary.createProduct');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
