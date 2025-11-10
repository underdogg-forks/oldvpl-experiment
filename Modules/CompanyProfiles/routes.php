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

use Modules\CompanyProfiles\Controllers\CompanyProfileController;
use Modules\CompanyProfiles\Controllers\LogoController;

Route::group(['middleware' => ['web', 'auth.admin']], function () {
    Route::get('company_profiles', [CompanyProfileController::class, 'index'])->name('companyProfiles.index');
    Route::get('company_profiles/create', [CompanyProfileController::class, 'create'])->name('companyProfiles.create');
    Route::post('company_profiles', [CompanyProfileController::class, 'store'])->name('companyProfiles.store');
    Route::get('company_profiles/{id}/edit', [CompanyProfileController::class, 'edit'])->name('companyProfiles.edit');
    Route::post('company_profiles/{id}', [CompanyProfileController::class, 'update'])->name('companyProfiles.update');
    Route::delete('company_profiles/{id}', [CompanyProfileController::class, 'delete'])->name('companyProfiles.delete');

    Route::post('company_profiles/{id}/delete_logo', [CompanyProfileController::class, 'deleteLogo'])->name('companyProfiles.deleteLogo');
    Route::post('company_profiles/ajax/modal_lookup', [CompanyProfileController::class, 'ajaxModalLookup'])->name('companyProfiles.ajax.modalLookup');
});

Route::get('company_profiles/{id}/logo', [LogoController::class, 'logo'])->name('companyProfiles.logo');