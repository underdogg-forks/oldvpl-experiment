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

use Modules\Setup\Controllers\SetupController;

Route::group(['middleware' => 'web'], function () {
    Route::get('setup', [SetupController::class, 'index'])->name('setup.index');
    Route::post('setup', [SetupController::class, 'postIndex'])->name('setup.postIndex');

    Route::get('setup/prerequisites', [SetupController::class, 'prerequisites'])->name('setup.prerequisites');

    Route::get('setup/db-config', [SetupController::class, 'dbConfig'])->name('setup.dbconfig');
    Route::post('setup/db-config', [SetupController::class, 'postDbConfig'])->name('setup.postDbconfig');

    Route::get('setup/migration', [SetupController::class, 'migration'])->name('setup.migration');
    Route::post('setup/migration', [SetupController::class, 'postMigration'])->name('setup.postMigration');

    Route::get('setup/account', [SetupController::class, 'account'])->name('setup.account');
    Route::post('setup/account', [SetupController::class, 'postAccount'])->name('setup.postAccount');

    Route::get('setup/complete', [SetupController::class, 'complete'])->name('setup.complete');
});
