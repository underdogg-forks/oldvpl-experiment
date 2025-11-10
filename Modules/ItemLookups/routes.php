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

use Modules\ItemLookups\Controllers\ItemLookupController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::get('item_lookups', [ItemLookupController::class, 'index'])->name('itemLookups.index');
    Route::get('item_lookups/create', [ItemLookupController::class, 'create'])->name('itemLookups.create');
    Route::post('item_lookups', [ItemLookupController::class, 'store'])->name('itemLookups.store');
    Route::get('item_lookups/{itemLookup}/edit', [ItemLookupController::class, 'edit'])->name('itemLookups.edit');
    Route::post('item_lookups/{itemLookup}', [ItemLookupController::class, 'update'])->name('itemLookups.update');
    Route::delete('item_lookups/{itemLookup}', [ItemLookupController::class, 'delete'])->name('itemLookups.delete');
    Route::get('item_lookups/ajax/item_lookup', [ItemLookupController::class, 'ajaxItemLookup'])->name('itemLookups.ajax.itemLookup');

    Route::post('item_lookups/ajax/process', [ItemLookupController::class, 'process'])->name('itemLookups.ajax.process');
});
