<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AircraftController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\FlightPositionController;
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



    Route::get('/aircraft/{icao24}', [AircraftController::class, 'show']);
    Route::get('/airports/{icao}/departures', [AirportController::class, 'departures']);
    Route::get('/airports/{icao}/arrivals', [AirportController::class, 'arrivals']);
    Route::get('/flights', [FlightController::class, 'index']);
    Route::get('/flights/by-hex/{icao24}', [FlightController::class, 'byHex']);

