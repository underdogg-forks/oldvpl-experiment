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

use Modules\Addons\Controllers\AddonController;

Route::group(['middleware' => ['web', 'auth.admin'], 'prefix' => 'addons'], function () {
    Route::get('/', [AddonController::class, 'index'])->name('addons.index');

    Route::get('install/{id}', [AddonController::class, 'install'])->name('addons.install');
    Route::get('uninstall/{id}', [AddonController::class, 'uninstall'])->name('addons.uninstall');
    Route::get('upgrade/{id}', [AddonController::class, 'upgrade'])->name('addons.upgrade');
});
