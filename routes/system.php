<?php

use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('/login', [\App\Http\Controllers\System\Auth\AuthController::class, 'login']);
});


Route::prefix('product')->middleware('jwt')->group(function () {
    Route::prefix('family')->group(function () {
        Route::get('/', [\App\Http\Controllers\System\Product\FamilyController::class, 'getAll']);
        Route::post('/', [\App\Http\Controllers\System\Product\FamilyController::class, 'create']);
        Route::get('/{id}', [\App\Http\Controllers\System\Product\FamilyController::class, 'getFamilyById']);
        Route::patch('/{id}', [\App\Http\Controllers\System\Product\FamilyController::class, 'updateFamily']);
        Route::patch('/status/{id}', [\App\Http\Controllers\System\Product\FamilyController::class, 'statusFamily']);
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [App\Http\Controllers\System\Product\CategoryController::class, 'getAll']);
    });
});
