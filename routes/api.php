<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CalculatePriceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/calculate', [CalculatePriceController::class, 'calculate'])->name('calculate_price');
