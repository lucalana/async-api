<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->prefix('teams')->group(function () {
    Route::get('/', [TeamController::class, 'index']);
    Route::get('/export', [TeamController::class, 'export']);
    Route::get('/export/download/{fileName}', [ExportController::class, 'download'])
        ->name('export-download');
    Route::get('/export/history', [ExportController::class, 'index']);
    Route::delete('/export/history/{export}', [ExportController::class, 'destroy']);
});
