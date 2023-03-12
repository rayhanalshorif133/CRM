<?php


//airline

use App\Http\Controllers\AirlineController;
use Illuminate\Support\Facades\Route;

Route::get('/airlines', [AirlineController::class, 'getAirlines'])->name('get-airlines');
