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

use Modules\CustomFields\Controllers\CustomFieldController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::get('custom_fields', [CustomFieldController::class, 'index'])->name('customFields.index');
    Route::get('custom_fields/create', [CustomFieldController::class, 'create'])->name('customFields.create');
    Route::post('custom_fields', [CustomFieldController::class, 'store'])->name('customFields.store');
    Route::get('custom_fields/{id}/edit', [CustomFieldController::class, 'edit'])->name('customFields.edit');
    Route::post('custom_fields/{id}', [CustomFieldController::class, 'update'])->name('customFields.update');
    Route::delete('custom_fields/{id}', [CustomFieldController::class, 'delete'])->name('customFields.delete');
});