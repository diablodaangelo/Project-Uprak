<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('menus.index');
});

Route::resource('menus', MenuController::class);
Route::resource('orders', OrderController::class)->except(['edit', 'update', 'destroy']);
Route::get('orders/{id}/receipt', [OrderController::class, 'generateReceipt'])->name('orders.receipt');
