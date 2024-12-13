<?php

use App\Http\Controllers\ItemController;


Route::middleware(['web'])->group(function () {
Route::get('/index', [ItemController::class, 'index'])->name('index');
Route::post('/store', [ItemController::class, 'store'])->name('store');
Route::get('/show/{id}', [ItemController::class, 'show'])->name('show');
Route::put('/update/{id}', [ItemController::class, 'update'])->name('update');
Route::delete('/destroy/{id}', [ItemController::class, 'destroy'])->name('destroy');
});