<?php

use Illuminate\Support\Facades\Route;

// Fallback on unknown requests
Route::fallback(function() {
    $result = [
        'code' => 404,
        'status' => 'Not found',
    ];
    return response()->json($result, 404);
});