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

use Modules\Quotes\Controllers\QuoteController;
use Modules\Quotes\Controllers\QuoteCopyController;
use Modules\Quotes\Controllers\QuoteCreateController;
use Modules\Quotes\Controllers\QuoteEditController;
use Modules\Quotes\Controllers\QuoteItemController;
use Modules\Quotes\Controllers\QuoteMailController;
use Modules\Quotes\Controllers\QuoteRecalculateController;
use Modules\Quotes\Controllers\QuoteToInvoiceController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::group(['prefix' => 'quotes'], function () {
        Route::get('/', [QuoteController::class, 'index'])->name('quotes.index');
        Route::get('create', [QuoteCreateController::class, 'create'])->name('quotes.create');
        Route::post('create', [QuoteCreateController::class, 'store'])->name('quotes.store');
        Route::get('{id}/edit', [QuoteEditController::class, 'edit'])->name('quotes.edit');
        Route::post('{id}/edit', [QuoteEditController::class, 'update'])->name('quotes.update');
        Route::delete('{id}', [QuoteController::class, 'delete'])->name('quotes.delete');
        Route::get('{id}/pdf', [QuoteController::class, 'pdf'])->name('quotes.pdf');

        Route::get('{id}/edit/refresh', [QuoteEditController::class, 'refreshEdit'])->name('quoteEdit.refreshEdit');
        Route::post('edit/refresh_to', [QuoteEditController::class, 'refreshTo'])->name('quoteEdit.refreshTo');
        Route::post('edit/refresh_from', [QuoteEditController::class, 'refreshFrom'])->name('quoteEdit.refreshFrom');
        Route::post('edit/refresh_totals', [QuoteEditController::class, 'refreshTotals'])->name('quoteEdit.refreshTotals');
        Route::post('edit/update_client', [QuoteEditController::class, 'updateClient'])->name('quoteEdit.updateClient');
        Route::post('edit/update_company_profile', [QuoteEditController::class, 'updateCompanyProfile'])->name('quoteEdit.updateCompanyProfile');
        Route::post('recalculate', [QuoteRecalculateController::class, 'recalculate'])->name('quotes.recalculate');
        Route::post('bulk/delete', [QuoteController::class, 'bulkDelete'])->name('quotes.bulk.delete');
        Route::post('bulk/status', [QuoteController::class, 'bulkStatus'])->name('quotes.bulk.status');
    });

    Route::group(['prefix' => 'quote_copy'], function () {
        Route::post('create', [QuoteCopyController::class, 'create'])->name('quote-copy.create');
        Route::post('store', [QuoteCopyController::class, 'store'])->name('quote-copy.store');
    });

    Route::group(['prefix' => 'quote_to_invoice'], function () {
        Route::post('create', [QuoteToInvoiceController::class, 'create'])->name('quote-to-invoice.create');
        Route::post('store', [QuoteToInvoiceController::class, 'store'])->name('quote-to-invoice.store');
    });

    Route::group(['prefix' => 'quote_mail'], function () {
        Route::post('create', [QuoteMailController::class, 'create'])->name('quote-mail.create');
        Route::post('store', [QuoteMailController::class, 'store'])->name('quote-mail.store');
    });

    Route::group(['prefix' => 'quote_item'], function () {
        Route::delete('delete', [QuoteItemController::class, 'delete'])->name('quote-item.delete');
    });
});
