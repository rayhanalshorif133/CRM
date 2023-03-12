<?php

use App\Http\Controllers\DealController;
use Illuminate\Support\Facades\Route;
//deal
Route::get('/new-deal/customer/{customer}', [DealController::class, 'create'])->name('create-deal');
Route::post('/deal', [DealController::class, 'store'])->name('store-deal');
Route::get('/deals', [DealController::class, 'index'])->name('index-deal');
Route::get('/deal/{deal}', [DealController::class, 'show'])->name('show-deal');
Route::get('/deal/{deal}/edit', [DealController::class, 'edit'])->name('edit-deal');
Route::get('/deal/{deal}/timeline', [DealController::class, 'getDealTimeLine'])->name('timeline-deal');
Route::get('/pendingdeal', [DealController::class, 'pendingDeal'])->name('pending-deal');
Route::post('/deal/{deal}/u', [DealController::class, 'update'])->name('update-deal');
