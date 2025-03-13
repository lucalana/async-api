<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->prefix('teams')->group(function () {
    Route::get('/', [TeamController::class, 'index']);
    Route::get('/export', [TeamController::class, 'export']);
    Route::get('/export/history', [ExportController::class, 'index']);
    Route::delete('/export/history', [ExportController::class, 'destroy']);
});
