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

use Modules\Notes\Controllers\NoteController;

Route::group(['prefix' => 'notes', 'middleware' => ['web', 'auth']], function () {
    Route::post('create', [NoteController::class, 'create'])->name('notes.create');
    Route::delete('delete', [NoteController::class, 'delete'])->name('notes.delete');
});