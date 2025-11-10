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

use Modules\TaxRates\Controllers\TaxRateController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::get('tax_rates', [TaxRateController::class, 'index'])->name('taxRates.index');
    Route::get('tax_rates/create', [TaxRateController::class, 'create'])->name('taxRates.create');
    Route::post('tax_rates', [TaxRateController::class, 'store'])->name('taxRates.store');
    Route::get('tax_rates/{taxRate}/edit', [TaxRateController::class, 'edit'])->name('taxRates.edit');
    Route::post('tax_rates/{taxRate}', [TaxRateController::class, 'update'])->name('taxRates.update');
    Route::delete('tax_rates/{taxRate}', [TaxRateController::class, 'delete'])->name('taxRates.delete');
});
