<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
use App\Http\Controllers\shippingRatesController;
use App\Http\Controllers\alamatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// customer 
Route::get("customer", [customerController::class, 'index']);
Route::get("customer/{id}", [customerController::class, 'show']);
Route::post("customer", [customerController::class, 'add']);
Route::post("customer/{id}", [customerController::class, 'edit']);
Route::delete("customer/{id}", [customerController::class, 'hapus']);

// alamat
Route::get("alamat", [alamatController::class, 'index']);
Route::get("alamat/{id}", [alamatController::class, 'show']);
Route::post("alamat", [alamatController::class, 'add']);
Route::post("alamat/{id}", [alamatController::class, 'edit']);
Route::delete("alamat/{id}", [alamatController::class, 'hapus']);

// shipping rates 
Route::get("shipping", [shippingRatesController::class, 'index']);
Route::get("shipping/{id}", [shippingRatesController::class, 'show']);
Route::post("shipping", [shippingRatesController::class, 'add']);
Route::post("shipping/{id}", [shippingRatesController::class, 'edit']);
Route::delete("shipping/{id}", [shippingRatesController::class, 'hapus']);