<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::name('car.')->group(function () {

    Route::get('/car', [CarController::class, 'index'])->name('index');

    Route::get('/car/create', [CarController::class, 'create'])->name('create');

    Route::post('/car', [CarController::class, 'store'])->name('store');

    Route::get('/car/{car}/edit', [CarController::class, 'edit'])->name('edit');

    Route::post('/car/{car}', [CarController::class, 'update'])->name('update');

    Route::delete('/car/{car}', [CarController::class, 'destroy'])->name('destroy');
});
