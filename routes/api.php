<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;



Route::prefix('teams')->group(function () {
    Route::get('/', [TeamController::class, 'index']);
    Route::get('/export', [TeamController::class, 'export']);
    Route::get('/export/history', [ExportController::class, 'index']);
    Route::delete('/export/history/{export}', [ExportController::class, 'destroy']);
});
