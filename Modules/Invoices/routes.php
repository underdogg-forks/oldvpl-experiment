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

use Modules\Invoices\Controllers\InvoiceController;
use Modules\Invoices\Controllers\InvoiceCreateController;
use Modules\Invoices\Controllers\InvoiceEditController;
use Modules\Invoices\Controllers\InvoiceRecalculateController;
use Modules\Invoices\Controllers\InvoiceCopyController;
use Modules\Invoices\Controllers\InvoiceMailController;
use Modules\Invoices\Controllers\InvoiceItemController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('invoices.index');
        Route::get('create', [InvoiceCreateController::class, 'create'])->name('invoices.create');
        Route::post('create', [InvoiceCreateController::class, 'store'])->name('invoices.store');
        Route::get('{id}/edit', [InvoiceEditController::class, 'edit'])->name('invoices.edit');
        Route::post('{id}/edit', [InvoiceEditController::class, 'update'])->name('invoices.update');
        Route::delete('{id}', [InvoiceController::class, 'delete'])->name('invoices.delete');
        Route::get('{id}/pdf', [InvoiceController::class, 'pdf'])->name('invoices.pdf');

        Route::get('{id}/edit/refresh', [InvoiceEditController::class, 'refreshEdit'])->name('invoiceEdit.refreshEdit');
        Route::post('edit/refresh_to', [InvoiceEditController::class, 'refreshTo'])->name('invoiceEdit.refreshTo');
        Route::post('edit/refresh_from', [InvoiceEditController::class, 'refreshFrom'])->name('invoiceEdit.refreshFrom');
        Route::post('edit/refresh_totals', [InvoiceEditController::class, 'refreshTotals'])->name('invoiceEdit.refreshTotals');
        Route::post('edit/update_client', [InvoiceEditController::class, 'updateClient'])->name('invoiceEdit.updateClient');
        Route::post('edit/update_company_profile', [InvoiceEditController::class, 'updateCompanyProfile'])->name('invoiceEdit.updateCompanyProfile');
        Route::post('recalculate', [InvoiceRecalculateController::class, 'recalculate'])->name('invoices.recalculate');
        Route::post('bulk/delete', [InvoiceController::class, 'bulkDelete'])->name('invoices.bulk.delete');
        Route::post('bulk/status', [InvoiceController::class, 'bulkStatus'])->name('invoices.bulk.status');
    });

    Route::group(['prefix' => 'invoice_copy'], function () {
        Route::post('create', [InvoiceCopyController::class, 'create'])->name('invoice-copy.create');
        Route::post('store', [InvoiceCopyController::class, 'store'])->name('invoice-copy.store');
    });

    Route::group(['prefix' => 'invoice_mail'], function () {
        Route::post('create', [InvoiceMailController::class, 'create'])->name('invoice-mail.create');
        Route::post('store', [InvoiceMailController::class, 'store'])->name('invoice-mail.store');
    });

    Route::group(['prefix' => 'invoice_item'], function () {
        Route::delete('delete', [InvoiceItemController::class, 'delete'])->name('invoice-item.delete');
    });
});