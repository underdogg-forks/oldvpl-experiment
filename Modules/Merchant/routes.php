<?php

use Modules\Merchant\Controllers\MerchantController;

Route::group(['prefix' => 'merchant', 'middleware' => 'web'], function () {
    Route::post('pay', [MerchantController::class, 'pay'])->name('merchant.pay');
    Route::get('{driver}/{urlKey}/cancel', [MerchantController::class, 'cancelUrl'])->name('merchant.cancelUrl');
    Route::get('{driver}/{urlKey}/return', [MerchantController::class, 'returnUrl'])->name('merchant.returnUrl');
    Route::post('{driver}/{urlKey}/webhook', [MerchantController::class, 'webhookUrl'])->name('merchant.webhookUrl');
});