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

use Modules\Payments\Controllers\PaymentController;
use Modules\Payments\Controllers\PaymentMailController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::get('payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('payments/store', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('payments/{payment}', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::post('payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');

    Route::delete('payments/{payment}', [PaymentController::class, 'delete'])->name('payments.delete');

    Route::post('bulk/delete', [PaymentController::class, 'bulkDelete'])->name('payments.bulk.delete');

    Route::group(['prefix' => 'payment_mail'], function () {
        Route::post('create', [PaymentMailController::class, 'create'])->name('payment-mail.create');
        Route::post('store', [PaymentMailController::class, 'store'])->name('payment-mail.store');
    });
});
