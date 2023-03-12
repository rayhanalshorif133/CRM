<?php

use App\Http\Controllers\AirportController;
use Illuminate\Support\Facades\Route;

Route::get('/airports', [AirportController::class, 'getAirports'])->name('get-airports');
