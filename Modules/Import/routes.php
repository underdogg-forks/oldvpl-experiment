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

use Modules\Import\Controllers\ImportController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::get('import', [ImportController::class, 'index'])->name('import.index');
    Route::get('import/map/{import_type}', [ImportController::class, 'mapImport'])->name('import.map');

    Route::post('import/upload', [ImportController::class, 'upload'])->name('import.upload');
    Route::post('import/map/{import_type}', [ImportController::class, 'mapImportSubmit'])->name('import.map.submit');
});