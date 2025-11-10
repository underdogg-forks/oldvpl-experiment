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

use Modules\Users\Controllers\UserController;
use Modules\Users\Controllers\UserPasswordController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('users/create/{userType}', [UserController::class, 'create'])->name('users.create');
    Route::post('users/create/{userType}', [UserController::class, 'store'])->name('users.store');

    Route::get('users/{id}/edit/{userType}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/{id}/edit/{userType}', [UserController::class, 'update'])->name('users.update');

    Route::delete('users/{id}', [UserController::class, 'delete'])->name('users.delete');

    Route::get('users/{id}/password/edit', [UserPasswordController::class, 'edit'])->name('users.password.edit');
    Route::post('users/{id}/password/edit', [UserPasswordController::class, 'update'])->name('users.password.update');

    Route::post('users/client', [UserController::class, 'getClientInfo'])->name('users.clientInfo');
});
