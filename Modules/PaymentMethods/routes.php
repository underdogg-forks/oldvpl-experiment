<?php

/**
 * InvoicePlane
 *
 * @package     InvoicePlane
 * @author      InvoicePlane Developers & Contributors
 * @copyright   Copyright (C) 2014 - 2018 InvoicePlane
 * @license     https://invoiceplane.com/license
 * @link        https://invoiceplane.com
 *
 * Based on FusionInvoice by Jesse Terry (FusionInvoice, LLC)
 */

use Modules\PaymentMethods\Controllers\PaymentMethodController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::get('payment_methods', [PaymentMethodController::class, 'index'])->name('paymentMethods.index');
    Route::get('payment_methods/create', [PaymentMethodController::class, 'create'])->name('paymentMethods.create');
    Route::post('payment_methods', [PaymentMethodController::class, 'store'])->name('paymentMethods.store');
    Route::get('payment_methods/{paymentMethod}/edit', [PaymentMethodController::class, 'edit'])->name('paymentMethods.edit');
    Route::post('payment_methods/{paymentMethod}', [PaymentMethodController::class, 'update'])->name('paymentMethods.update');
    Route::delete('payment_methods/{paymentMethod}', [PaymentMethodController::class, 'delete'])->name('paymentMethods.delete');
});