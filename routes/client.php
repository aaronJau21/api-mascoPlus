<?php

use Illuminate\Support\Facades\Route;

Route::get('/families', [\App\Http\Controllers\Client\Product\FamilyController::class, 'index']);
