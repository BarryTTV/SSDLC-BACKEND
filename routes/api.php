<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\PersonalController;

// Rutas públicas
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas por autenticación
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', fn() => auth()->user());

    // Reports
    Route::get('/reports', [ReportController::class, 'index']);
    Route::post('/reports', [ReportController::class, 'store']);
    Route::patch('/reports', [ReportController::class, 'updateStatus']);

    // Personal (alta de personal)
    Route::get('/personals', [PersonalController::class, 'index']);
    Route::post('/personals', [PersonalController::class, 'store']);
    Route::get('/personals/{id}', [PersonalController::class, 'show']);
});
