<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProvidersController;
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


Route::get('category', [App\Http\Controllers\CategoryController::class, 'create'])->name('inventary.createCategory');
Route::get('category', [App\Http\Controllers\CategoryController::class, 'index2'])->name('inventary.createCategory');
Route::post('category', [App\Http\Controllers\CategoryController::class, 'store'])->name('inventary.createCategory');
Route::get('category/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('inventary.editCategory');
Route::patch('category/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('inventary.editCategory');
Route::delete('category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('inventary.createCategory.destroy');

Route::get('listByCategory', [App\Http\Controllers\CategoryController::class, 'listByCategory'])->name('inventary.listByCategory');


Route::get('providers', [App\Http\Controllers\ProvidersController::class, 'create'])->name('providers.createProviders');
Route::get('list-providers', [App\Http\Controllers\ProvidersController::class, 'index2'])->name('providers.listProviders');
Route::post('providers', [App\Http\Controllers\ProvidersController::class, 'store'])->name('providers.createProviders');
Route::get('providers/{id}', [App\Http\Controllers\ProvidersController::class, 'edit'])->name('providers.editProviders');
Route::patch('providers/{id}', [App\Http\Controllers\ProvidersController::class, 'update'])->name('providers.editProviders');
Route::get('listByProviders', [App\Http\Controllers\ProvidersController::class, 'providersProducts'])->name('providers.listProductsByProviders');

Route::get('createProducts', [App\Http\Controllers\ProductController::class, 'create'])->name('inventary.createProduct');
Route::get('list-of-products-for-sale', [App\Http\Controllers\ProductController::class, 'listOfProductsforSale'])->name('sales.listProducts');
Route::post('createProduct', [App\Http\Controllers\ProductController::class, 'store'])->name('inventary.createProduct');
Route::get('product-edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('inventary.editProduct');

Route::patch('product-edit/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('inventary.editProduct');

Route::get('add-products/{id}', [App\Http\Controllers\ProductController::class, 'edit2'])->name('inventary.addProducts');
Route::patch('add-products/{id}', [App\Http\Controllers\ProductController::class, 'productsAdd'])->name('inventary.addProducts');
//Route::get()

Route::get('addProducts', [App\Http\Controllers\ReportsController::class, 'index'])->name('inventary.addListProducts');

Route::get('list-sales', [App\Http\Controllers\SalesController::class, 'index'])->name('sales.listSales');
Route::get('sales/{id}', [App\Http\Controllers\SalesController::class, 'create'])->name('sales.createSales');
Route::post('sales/{id}', [App\Http\Controllers\SalesController::class, 'store'])->name('sales.createSales');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
