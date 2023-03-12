<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function () {
    // Artisan::call('cache:clear');
    // Artisan::call('config:clear');
    // Artisan::call('route:clear');
    // Artisan::call('view:clear');
    // Artisan::call('event:clear');
    // Artisan::call('optimize:clear');
    // Artisan::call('optimize');
    Artisan::call('route:cache');
    return 'cleared';
});

Route::get('/', function () {
    return redirect()->route('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    foreach (glob(base_path('routes/_partials/*.php')) as $route) {
        require_once $route;
    }
});

Auth::routes();
