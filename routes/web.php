<?php

use App\Http\Controllers\LocationsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {
    Route::get('locations', [LocationsController::class, 'getLocations']);
    Route::get('location/{location}/blocks', [LocationsController::class, 'getLocationBlockMatches']);

    Route::group(['prefix' => 'user/{user}/'], function () {
        Route::post('room/{room}/book', [UserController::class, 'postRoomBlockBooking']);
        Route::get('bookings', [UserController::class, 'getBookings']);
    });
});
