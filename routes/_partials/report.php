<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;



Route::prefix('report/')
    ->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name("report.index");
        Route::get('/get-data/{user_id?}/{date?}', [ReportController::class, 'getReportByDate'])
            ->name("report.searchByDate");
        Route::post('show/', [ReportController::class, 'getReportShow'])->name("report.show");

        // Chart
        Route::get('/chart', [ChartController::class, 'index'])->name("report.chart.index");
        Route::get('/chart/get-data/{date?}/{user?}', [ChartController::class, 'getReportByDate'])->name("report.chart.getReportByDate");
    });
