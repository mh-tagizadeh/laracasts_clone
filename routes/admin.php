<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function() {

    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('check', [AuthController::class, 'check']);
    });

});
