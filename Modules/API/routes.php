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

use Modules\API\Controllers\ApiClientController;
use Modules\API\Controllers\ApiInvoiceController;
use Modules\API\Controllers\ApiKeyController;
use Modules\API\Controllers\ApiPaymentController;
use Modules\API\Controllers\ApiQuoteController;

Route::group(['prefix' => 'api', 'middleware' => 'web'], function () {
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::post('generate_keys', [ApiKeyController::class, 'generateKeys'])->name('api.generateKeys');
    });

    Route::group(['middleware' => 'auth.api'], function () {
        Route::post('clients/list', [ApiClientController::class, 'lists']);
        Route::post('clients/show', [ApiClientController::class, 'show']);
        Route::post('clients/store', [ApiClientController::class, 'store']);
        Route::post('clients/update', [ApiClientController::class, 'update']);
        Route::post('clients/delete', [ApiClientController::class, 'delete']);

        Route::post('quotes/list', [ApiQuoteController::class, 'lists']);
        Route::post('quotes/show', [ApiQuoteController::class, 'show']);
        Route::post('quotes/store', [ApiQuoteController::class, 'store']);
        Route::post('quotes/items/add', [ApiQuoteController::class, 'addItem']);
        Route::post('quotes/delete', [ApiQuoteController::class, 'delete']);

        Route::post('invoices/list', [ApiInvoiceController::class, 'lists']);
        Route::post('invoices/show', [ApiInvoiceController::class, 'show']);
        Route::post('invoices/store', [ApiInvoiceController::class, 'store']);
        Route::post('invoices/items/add', [ApiInvoiceController::class, 'addItem']);
        Route::post('invoices/delete', [ApiInvoiceController::class, 'delete']);

        Route::post('payments/list', [ApiPaymentController::class, 'lists']);
        Route::post('payments/show', [ApiPaymentController::class, 'show']);
        Route::post('payments/store', [ApiPaymentController::class, 'store']);
        Route::post('payments/items/add', [ApiPaymentController::class, 'addItem']);
        Route::post('payments/delete', [ApiPaymentController::class, 'delete']);
    });

});
