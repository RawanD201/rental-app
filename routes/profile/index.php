<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::name('profile.')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('index');

    Route::get('/profile/create', [ProfileController::class, 'create'])->name('create');

    Route::post('/profile', [ProfileController::class, 'store'])->name('store');


    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('edit');

    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('update');

    Route::get('/profile/manage', [ProfileController::class, 'manage'])->name('manage');

    Route::delete('/profile/{user}', [ProfileController::class, 'destroy'])->name('destroy');
});
