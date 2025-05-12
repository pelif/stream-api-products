<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [App\Http\Controllers\Auth::class, 'login']);


Route::group(['prefix' => 'categories', 'middleware' => 'auth:sanctum'], fn () => [
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index'),
    Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show'),
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store'),
    Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update'),
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy'),
]);

Route::group(['prefix' => 'products', 'middleware' => 'auth:sanctum'], fn () => [
    Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index'),
    Route::get('/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show'),
    Route::post('/', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store'),
    Route::put('/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update'),
    Route::delete('/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy'),
]);

Route::get('/hello', function () {
    return response()->json(['message' => 'Hello World']);
})->middleware('auth:sanctum');

Route::get('/hello-world', function () {
    return response()->json(['message' => 'Hello World']);
})->middleware('auth:sanctum');

