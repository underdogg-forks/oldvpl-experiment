<?php

use Modules\Attachments\Controllers\AttachmentController;

Route::group(['prefix' => 'attachments', 'middleware' => 'web'], function () {
    Route::get('{urlKey}/download', [AttachmentController::class, 'download'])->name('attachments.download');

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::post('ajax/list', [AttachmentController::class, 'ajaxList'])->name('attachments.ajax.list');
        Route::delete('ajax/delete', [AttachmentController::class, 'ajaxDelete'])->name('attachments.ajax.delete');
        Route::post('ajax/modal', [AttachmentController::class, 'ajaxModal'])->name('attachments.ajax.modal');
        Route::post('ajax/upload', [AttachmentController::class, 'ajaxUpload'])->name('attachments.ajax.upload');
        Route::post('ajax/access/update', [AttachmentController::class, 'ajaxAccessUpdate'])->name('attachments.ajax.access.update');
    });
});