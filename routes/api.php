<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveTableController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

// User authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/check-availability', [ReserveTableController::class, 'check']);
    Route::post('/reserve-table', [ReserveTableController::class, 'reserve']);
    Route::get('/menu', [MenuController::class, 'list']);
    Route::post('/order', [OrderController::class, 'placeOrder']);
    Route::post('/checkout', [PaymentController::class, 'checkout']);
});
