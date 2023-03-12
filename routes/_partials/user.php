<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/user-permission', [UserController::class, 'permission'])->name('user-permission');
Route::get('/select-user-menu/{id}', [UserController::class, 'user_menu'])->name('select-user-menu');
Route::post('/save-permission', [UserController::class, 'save_permission'])->name('save-permission');
Route::get('/user-list', [UserController::class, 'index'])->name('user-list');
Route::get('/users', [UserController::class, 'getUsers'])->name('users');
Route::post('/save-user', [UserController::class, 'store'])->name('save-user');
Route::get('/change-user-status/{status}/{id}', [UserController::class, 'status_update'])->name('change-user-status');
Route::post('/update-user', [UserController::class, 'update'])->name('update-user');
