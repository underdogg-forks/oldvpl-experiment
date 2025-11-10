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

use Modules\Clients\Controllers\ClientController;
use Modules\Clients\Controllers\ContactController;

Route::group(['middleware' => ['web', 'auth.admin'], 'prefix' => 'clients'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('clients.index');
    Route::get('create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('create', [ClientController::class, 'store'])->name('clients.store');
    Route::get('{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('{id}/edit', [ClientController::class, 'update'])->name('clients.update');
    Route::get('{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::delete('{id}', [ClientController::class, 'delete'])->name('clients.delete');
    Route::get('ajax/lookup', [ClientController::class, 'ajaxLookup'])->name('clients.ajax.lookup');

    Route::post('ajax/modal_edit', [ClientController::class, 'ajaxModalEdit'])->name('clients.ajax.modalEdit');
    Route::post('ajax/modal_lookup', [ClientController::class, 'ajaxModalLookup'])->name('clients.ajax.modalLookup');
    Route::post('ajax/modal_update/{id}', [ClientController::class, 'ajaxModalUpdate'])->name('clients.ajax.modalUpdate');
    Route::post('ajax/check_name', [ClientController::class, 'ajaxCheckName'])->name('clients.ajax.checkName');
    Route::post('ajax/check_duplicate_name', [ClientController::class, 'ajaxCheckDuplicateName'])->name('clients.ajax.checkDuplicateName');

    Route::post('bulk/delete', [ClientController::class, 'bulkDelete'])->name('clients.bulk.delete');

    Route::group(['prefix' => '{clientId}/contacts'], function () {
        Route::get('create', [ContactController::class, 'create'])->name('clients.contacts.create');
        Route::post('create', [ContactController::class, 'store'])->name('clients.contacts.store');
        Route::get('edit/{contactId}', [ContactController::class, 'edit'])->name('clients.contacts.edit');
        Route::post('edit/{contactId}', [ContactController::class, 'update'])->name('clients.contacts.update');
        Route::delete('delete', [ContactController::class, 'delete'])->name('clients.contacts.delete');
        Route::post('default', [ContactController::class, 'updateDefault'])->name('clients.contacts.updateDefault');
    });
});