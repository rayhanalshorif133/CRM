<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::post('/save-token', [NotificationController::class, 'saveToken'])->name('save-token');
Route::get('/send-notification/{id?}/{title?}/{msg?}', [NotificationController::class, 'sendNotification'])->name('send.notification');
