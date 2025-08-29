<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CropsController;
use App\Http\Controllers\CropsDiseasesController;

// Fallback on unknown requests
Route::fallback(function() {
    $result = [
        'code' => 404,
        'status' => 'Not found',
    ];
    return response()->json($result, 404);
});

Route::post('/crops/diseases', [CropsDiseasesController::class, 'store']);
Route::get('/crops/diseases', [CropsDiseasesController::class, 'index']);
Route::get('/crops/diseases/{id}', [CropsDiseasesController::class, 'show']);
Route::patch('/crops/diseases/{id}', [CropsDiseasesController::class, 'update']);

Route::post('/crops', [CropsController::class, 'store']);
Route::get('/crops', [CropsController::class, 'index']);
Route::get('/crops/{id}', [CropsController::class, 'show']);
Route::patch('/crops/{id}', [CropsController::class, 'update']);