<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreatController;

Route::name('treat.')->group(function () {

    Route::get('/treat', [TreatController::class, 'index'])->name('index');

    Route::get('/treat/dashboard', [TreatController::class, 'dashboard'])->name('dashboard');

    Route::get('/treat/pdf', [TreatController::class, 'pdf'])->name('pdf');

    Route::get('/treat/report-pdf', [TreatController::class, 'reportPdf'])->name('report-pdf');

    Route::get('/treat/report', [TreatController::class, 'report'])->name('report');

    Route::get('/treat/create', [TreatController::class, 'create'])->name('create');

    Route::post('/treat', [TreatController::class, 'store'])->name('store');

    Route::get('/treat/{treat}/edit', [TreatController::class, 'edit'])->name('edit');

    Route::patch('/treat/{treat}', [TreatController::class, 'update'])->name('update');

    Route::delete('/treat/{treat}', [TreatController::class, 'destroy'])->name('destroy');
});
