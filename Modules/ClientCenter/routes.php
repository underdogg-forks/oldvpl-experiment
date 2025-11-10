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

use Modules\ClientCenter\Controllers\ClientCenterDashboardController;
use Modules\ClientCenter\Controllers\ClientCenterPublicInvoiceController;
use Modules\ClientCenter\Controllers\ClientCenterPublicQuoteController;
use Modules\ClientCenter\Controllers\ClientCenterInvoiceController;
use Modules\ClientCenter\Controllers\ClientCenterQuoteController;
use Modules\ClientCenter\Controllers\ClientCenterPaymentController;

Route::group(['prefix' => 'client_center', 'middleware' => 'web'], function () {
    Route::get('/', [ClientCenterDashboardController::class, 'redirectToLogin']);
    Route::get('invoice/{invoiceKey}', [ClientCenterPublicInvoiceController::class, 'show'])->name('clientCenter.public.invoice.show');
    Route::get('invoice/{invoiceKey}/pdf', [ClientCenterPublicInvoiceController::class, 'pdf'])->name('clientCenter.public.invoice.pdf');
    Route::get('invoice/{invoiceKey}/html', [ClientCenterPublicInvoiceController::class, 'html'])->name('clientCenter.public.invoice.html');
    Route::get('quote/{quoteKey}', [ClientCenterPublicQuoteController::class, 'show'])->name('clientCenter.public.quote.show');
    Route::get('quote/{quoteKey}/pdf', [ClientCenterPublicQuoteController::class, 'pdf'])->name('clientCenter.public.quote.pdf');
    Route::get('quote/{quoteKey}/html', [ClientCenterPublicQuoteController::class, 'html'])->name('clientCenter.public.quote.html');
    Route::get('quote/{quoteKey}/approve', [ClientCenterPublicQuoteController::class, 'approve'])->name('clientCenter.public.quote.approve');
    Route::get('quote/{quoteKey}/reject', [ClientCenterPublicQuoteController::class, 'reject'])->name('clientCenter.public.quote.reject');

    Route::group(['middleware' => 'auth.clientCenter'], function () {
        Route::get('dashboard', [ClientCenterDashboardController::class, 'index'])->name('clientCenter.dashboard');
        Route::get('invoices', [ClientCenterInvoiceController::class, 'index'])->name('clientCenter.invoices');
        Route::get('quotes', [ClientCenterQuoteController::class, 'index'])->name('clientCenter.quotes');
        Route::get('payments', [ClientCenterPaymentController::class, 'index'])->name('clientCenter.payments');
    });
});