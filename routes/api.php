<?php

use App\Http\Controllers\Api\ApiWelcomeController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products',[ApiWelcomeController::class,'products']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
