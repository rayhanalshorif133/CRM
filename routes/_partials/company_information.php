<?php

use App\Http\Controllers\CompanyInformationController;
use Illuminate\Support\Facades\Route;



/** Company Information */
Route::get('/company-information', [CompanyInformationController::class, 'index'])->name('company-information');
Route::post('/save-company', [CompanyInformationController::class, 'store'])->name('save-company');
Route::post('/update-company', [CompanyInformationController::class, 'update'])->name('update-company');
