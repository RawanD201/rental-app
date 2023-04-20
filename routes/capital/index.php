<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CapitalController;

Route::name('capital.')->group(function () {


    Route::get('/capital/create', [CapitalController::class, 'create'])->name('create');

    // Route::get('/expenseType/{expenseType}/edit', [CapitalController::class, 'edit'])->name('edit');

    Route::patch('/capital/{capital}', [CapitalController::class, 'update'])->name('update');

    Route::post('/capital', [CapitalController::class, 'store'])->name('store');

    Route::delete('/capital/{capital}', [CapitalController::class, 'destroy'])->name('destroy');
});
