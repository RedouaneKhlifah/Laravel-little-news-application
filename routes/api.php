<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;







Route::group(['prefix' => 'auth'],function(){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'news'], function () {
        Route::get('/', [NewsController::class, 'index']);// Retrieve all news
        Route::get('/latest-active', [NewsController::class, 'displayActiveNewsDesc']); 
        Route::post('/', [NewsController::class, 'store']); // Create a new news item
        Route::get('/{id}', [NewsController::class, 'show']); // Retrieve a specific news item
        Route::put('/{id}', [NewsController::class, 'update']); // Update a specific news item
        Route::delete('/{id}', [NewsController::class, 'destroy']); 
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategorieController::class, 'index']); 
        Route::get('/search/{name}', [CategorieController::class, 'searchCategoryByName']);// Retrieve category with all sub categories recursively
    });
});

