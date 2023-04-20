<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseTypeController;

Route::name('expenseType.')->group(function () {


    Route::get('/expenseType/create', [ExpenseTypeController::class, 'create'])->name('create');

    // Route::get('/expenseType/{expenseType}/edit', [ExpenseTypeController::class, 'edit'])->name('edit');

    Route::patch('/expenseType/{expenseType}', [ExpenseTypeController::class, 'update'])->name('update');

    Route::post('/expenseType', [ExpenseTypeController::class, 'store'])->name('store');

    Route::delete('/expenseType/{expenseType}', [ExpenseTypeController::class, 'destroy'])->name('destroy');
});
