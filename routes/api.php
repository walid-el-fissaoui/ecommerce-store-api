<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

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

// ============== Public Routes ==============
// Authentication
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
// Products
Route::get('/products',[ProductController::class,'index']);
Route::post('/products/create',[ProductController::class,'store']);
Route::get('/search',[ProductController::class,'search']);
Route::get('/search/cart',[ProductController::class,'cart']);
Route::get('/products/{id}',[ProductController::class,'show']);
Route::get('/products{title}',[ProductController::class,'search']);
// Categories
Route::get('/categories',[CategoryController::class,'index']);
// Brands
Route::get('/brands',[BrandController::class,'index']);
// Colors
Route::get('/colors',[ColorController::class,'index']);
Route::get('/colors/search',[ColorController::class,'search']);
// Sizes
Route::get('/sizes',[SizeController::class,'index']);
Route::get('/sizes/search',[SizeController::class,'search']);
// Sexes
Route::get('/sexes',[SexController::class,'index']);
// Orders
Route::post('/orders',[OrderController::class,'store']);
// Users
Route::get('/users',[UserController::class,'index']);
Route::delete('/users/{id}',[UserController::class,'destroy']);

// Items
Route::get('/items',[ItemController::class,'index']);

// ============== Protected Routes ==============
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::delete('/products/{id}',[ProductController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
