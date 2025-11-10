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

use Modules\MailQueue\Controllers\MailLogController;

Route::group(['prefix' => 'mail_log', 'middleware' => ['web', 'auth.admin']], function () {
    Route::get('/', [MailLogController::class, 'index'])->name('mailLog.index');
    Route::post('content', [MailLogController::class, 'content'])->name('mailLog.content');
    Route::delete('{id}', [MailLogController::class, 'delete'])->name('mailLog.delete');
});
