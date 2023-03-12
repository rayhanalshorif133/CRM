<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

//customer
Route::get('/create-customer', [CustomerController::class, 'create'])->name('create-customer');
Route::get('/getCustomerByMobileNo/{mobile}', [CustomerController::class, 'getCustomerByMobileNo'])->name('getCustomerByMobileNo');
Route::get('/getCustomerByNid/{nid}', [CustomerController::class, 'getCustomerByNid'])->name('getCustomerByNid');
Route::post('/customer', [CustomerController::class, 'store'])->name('save-customer');
Route::put('/customer/{customer}', [CustomerController::class, 'update'])->name('update-customer');
