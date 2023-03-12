<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubServicesController;
use Illuminate\Support\Facades\Route;


/** service section  */
Route::get('/service-list', [ServiceController::class, 'index'])->name('service-list');
Route::post('/save-service', [ServiceController::class, 'store'])->name('save-service');
Route::get('/change-service-status/{status}/{id}', [ServiceController::class, 'status_update'])->name('change-service-status');
Route::post('/update-service', [ServiceController::class, 'update'])->name('update-service');


/** Sub service section  */
Route::get('/sub-service-list', [SubServicesController::class, 'index'])->name('sub-service-list');
Route::post('/save-sub-service', [SubServicesController::class, 'store'])->name('save-sub-service');
Route::get('/change-sub-service-status/{status}/{id}', [SubServicesController::class, 'status_update'])->name('change-sub-service-status');
Route::post('/update-sub-service', [SubServicesController::class, 'update'])->name('update-sub-service');
Route::post('/load_sub_service', [SubServicesController::class, 'load_sub_service'])->name('load_sub_service');


/** service section  */
    // Route::get('/deal-list', [DealController::class, 'index'])->name('deal-list');
    // Route::post('/save-deal', [DealController::class, 'store'])->name('save-deal');
    // Route::get('/change-deal-status/{status}/{id}',[DealController::class,'status_update'])->name('change-deal-status');
