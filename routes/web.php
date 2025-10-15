<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderController::class, 'index'])->name('orders.index');

Route::prefix('/orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/{id}', [OrderController::class, 'show'])->name('order.show')->whereNumber('id');
    Route::post('/', [OrderController::class, 'store'])->name('order.store');
    Route::delete('/orders/{id}', [OrderController::class, 'delete'])->name('order.delete');
    Route::put('/{id}', [OrderController::class, 'update'])->name('order.update')->whereNumber('id');
});