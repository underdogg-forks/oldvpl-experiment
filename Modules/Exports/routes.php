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

use Modules\Exports\Controllers\ExportController;

Route::group(['middleware' => ['web', 'auth.admin'], 'prefix' => 'export'], function () {
    Route::get('/', [ExportController::class, 'index'])->name('export.index');
    Route::post('{export}', [ExportController::class, 'export'])->name('export.export');
});