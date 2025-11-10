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

use Modules\Settings\Controllers\SettingController;
use Modules\Settings\Controllers\BackupController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('settings/update_check', [SettingController::class, 'updateCheck'])->name('settings.updateCheck');
    Route::delete('settings/logo', [SettingController::class, 'logoDelete'])->name('settings.logo.delete');
    Route::post('settings/save_tab', [SettingController::class, 'saveTab'])->name('settings.saveTab');

    if (!config('app.demo')) {
        Route::get('backup/database', [BackupController::class, 'database'])->name('settings.backup.database');
    }
});