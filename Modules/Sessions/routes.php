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

use Modules\Sessions\Controllers\SessionController;

Route::group(['middleware' => 'web'], function () {
    Route::get('login', [SessionController::class, 'login'])->name('session.login');
    Route::post('login', [SessionController::class, 'attempt'])->name('session.attempt');
    Route::get('logout', [SessionController::class, 'logout'])->name('session.logout');
});