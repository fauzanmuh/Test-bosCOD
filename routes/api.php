<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransferController;


Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/update-token', [AuthController::class, 'updateToken']);

Route::middleware('auth:api')->group(function () {
    Route::post('/transfer', [TransferController::class, 'createTransfer']);
});