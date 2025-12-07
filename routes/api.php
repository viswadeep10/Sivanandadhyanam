<?php
use App\Http\Controllers\Api\FlightController;

Route::post('/flights/search', [FlightController::class, 'search']);
