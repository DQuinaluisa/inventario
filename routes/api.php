<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('category', [CategoryController::class, 'index']);
Route::post('category', [CategoryController::class, 'store']);
Route::get('category/{id}', [CategoryController::class, 'show']);
Route::put('category/{id}', [CategoryController::class, 'update']);
Route::delete('category/{id}', [CategoryController::class, 'destroy']);

Route::get('categorys', [CategoryController::class, 'listByCategory']);
Route::get('providers', [ProvidersController::class, 'index2']);
Route::get('providers', [ProvidersController::class, 'providersProducts']);


Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);
Route::put('add-product/{id}', [ProductController::class, 'productsAdd']);


Route::get('sales', [SalesController::class, 'index']);
Route::post('sales/{id}', [SalesController::class, 'store']);
Route::get('sales/{id}', [SalesController::class, 'create']);

Route::get('home', [HomeController::class, 'index2']);
