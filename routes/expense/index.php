<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;

Route::name('expense.')->group(function () {

    Route::get('/expense', [ExpenseController::class, 'index'])->name('index');

    Route::get('/expense/create', [ExpenseController::class, 'create'])->name('create');

    Route::post('/expense', [ExpenseController::class, 'store'])->name('store');

    Route::get('/expense/{expense}/edit', [ExpenseController::class, 'edit'])->name('edit');

    Route::post('/expense/{expense}', [ExpenseController::class, 'update'])->name('update');

    Route::delete('/expense/{expense}', [ExpenseController::class, 'destroy'])->name('destroy');
});
