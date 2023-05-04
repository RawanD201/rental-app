<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantController;

Route::name('merchant.')->group(function () {

    Route::get('/merchant', [MerchantController::class, 'index'])->name('index');

    Route::get('/merchant/create', [MerchantController::class, 'create'])->name('create');

    Route::post('/merchant', [MerchantController::class, 'store'])->name('store');

    Route::get('/merchant/{merchant}/edit', [MerchantController::class, 'edit'])->name('edit');

    Route::patch('/merchant/{merchant}', [MerchantController::class, 'update'])->name('update');

    Route::delete('/merchant/{merchant}', [MerchantController::class, 'destroy'])->name('destroy');
});
