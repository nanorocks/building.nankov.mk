<?php

use App\Http\Controllers\ActionHistoryController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ComplexController;
use App\Http\Controllers\FloorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::prefix('v1')->group(function () {

    Route::get('/apartments', [ApartmentController::class, 'all']);
    Route::get('/apartments/{slug}', [ApartmentController::class, 'single']);
    Route::post('/apartments', [ApartmentController::class, 'create']);
    Route::put('/apartments/{slug}', [ApartmentController::class, 'update']);
    Route::delete('/apartments/{slug}', [ApartmentController::class, 'delete']);

    Route::get('/floors', [FloorController::class, 'all']);
    Route::get('/floors/{slug}', [FloorController::class, 'single']);
    Route::post('/floors', [FloorController::class, 'create']);
    Route::put('/floors/{slug}', [FloorController::class, 'update']);
    Route::delete('/floors/{slug}', [FloorController::class, 'delete']);

    Route::get('/buildings', [BuildingController::class, 'all']);
    Route::get('/buildings/{slug}', [BuildingController::class, 'single']);
    Route::post('/buildings', [BuildingController::class, 'create']);
    Route::put('/buildings/{slug}', [BuildingController::class, 'update']);
    Route::delete('/buildings/{slug}', [BuildingController::class, 'delete']);

    Route::get('/complexes', [ComplexController::class, 'all']);
    Route::get('/complexes/{slug}', [ComplexController::class, 'single']);
    Route::post('/complexes', [ComplexController::class, 'create']);
    Route::put('/complexes/{slug}', [ComplexController::class, 'update']);
    Route::delete('/complexes/{slug}', [ComplexController::class, 'delete']);

    Route::get('/action-history', [ActionHistoryController::class, 'all']);

})->middleware('auth:api');
