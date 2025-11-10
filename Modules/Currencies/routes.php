<?php

/**
 * InvoicePlane
 *
 * @author      InvoicePlane Developers & Contributors
 * @copyright   Copyright (C) 2014 - 2018 InvoicePlane
 * @license     https://invoiceplane.com/license
 *
 * @link        https://invoiceplane.com
 *
 * Based on FusionInvoice by Jesse Terry (FusionInvoice, LLC)
 */

use Modules\Currencies\Controllers\CurrencyController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::get('currencies', [CurrencyController::class, 'index'])->name('currencies.index');
    Route::get('currencies/create', [CurrencyController::class, 'create'])->name('currencies.create');
    Route::post('currencies', [CurrencyController::class, 'store'])->name('currencies.store');
    Route::get('currencies/{id}/edit', [CurrencyController::class, 'edit'])->name('currencies.edit');
    Route::post('currencies/{id}', [CurrencyController::class, 'update'])->name('currencies.update');
    Route::delete('currencies/{id}', [CurrencyController::class, 'delete'])->name('currencies.delete');

    Route::post('currencies/get-exchange-rate', [CurrencyController::class, 'getExchangeRate'])->name('currencies.getExchangeRate');
});
