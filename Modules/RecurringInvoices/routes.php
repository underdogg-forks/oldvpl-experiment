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

use Modules\RecurringInvoices\Controllers\RecurringInvoiceController;
use Modules\RecurringInvoices\Controllers\RecurringInvoiceCopyController;
use Modules\RecurringInvoices\Controllers\RecurringInvoiceCreateController;
use Modules\RecurringInvoices\Controllers\RecurringInvoiceEditController;
use Modules\RecurringInvoices\Controllers\RecurringInvoiceItemController;
use Modules\RecurringInvoices\Controllers\RecurringInvoiceRecalculateController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::group(['prefix' => 'recurring_invoices'], function () {
        Route::get('/', [RecurringInvoiceController::class, 'index'])->name('recurringInvoices.index');
        Route::get('create', [RecurringInvoiceCreateController::class, 'create'])->name('recurringInvoices.create');
        Route::post('create', [RecurringInvoiceCreateController::class, 'store'])->name('recurringInvoices.store');
        Route::get('{id}/edit', [RecurringInvoiceEditController::class, 'edit'])->name('recurringInvoices.edit');
        Route::post('{id}/edit', [RecurringInvoiceEditController::class, 'update'])->name('recurringInvoices.update');
        Route::delete('{id}', [RecurringInvoiceController::class, 'delete'])->name('recurringInvoices.delete');

        Route::get('{id}/edit/refresh', [RecurringInvoiceEditController::class, 'refreshEdit'])->name('recurringInvoiceEdit.refreshEdit');
        Route::post('edit/refresh_to', [RecurringInvoiceEditController::class, 'refreshTo'])->name('recurringInvoiceEdit.refreshTo');
        Route::post('edit/refresh_from', [RecurringInvoiceEditController::class, 'refreshFrom'])->name('recurringInvoiceEdit.refreshFrom');
        Route::post('edit/refresh_totals', [RecurringInvoiceEditController::class, 'refreshTotals'])->name('recurringInvoiceEdit.refreshTotals');
        Route::post('edit/update_client', [RecurringInvoiceEditController::class, 'updateClient'])->name('recurringInvoiceEdit.updateClient');
        Route::post('edit/update_company_profile', [RecurringInvoiceEditController::class, 'updateCompanyProfile'])->name('recurringInvoiceEdit.updateCompanyProfile');
        Route::post('recalculate', [RecurringInvoiceRecalculateController::class, 'recalculate'])->name('recurringInvoices.recalculate');
    });

    Route::group(['prefix' => 'recurring_invoice_copy'], function () {
        Route::post('create', [RecurringInvoiceCopyController::class, 'create'])->name('recurring-invoice-copy.create');
        Route::post('store', [RecurringInvoiceCopyController::class, 'store'])->name('recurring-invoice-copy.store');
    });

    Route::group(['prefix' => 'recurring_invoice_item'], function () {
        Route::delete('delete', [RecurringInvoiceItemController::class, 'delete'])->name('recurring-invoice-item.delete');
    });
});
