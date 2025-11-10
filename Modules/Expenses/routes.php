<?php

use Modules\Expenses\Controllers\ExpenseBillController;
use Modules\Expenses\Controllers\ExpenseController;
use Modules\Expenses\Controllers\ExpenseCreateController;
use Modules\Expenses\Controllers\ExpenseEditController;
use Modules\Expenses\Controllers\ExpenseLookupController;

Route::group(['middleware' => ['web', 'auth.admin'], 'prefix' => 'expenses'], function () {
    Route::get('/', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::get('create', [ExpenseCreateController::class, 'create'])->name('expenses.create');
    Route::post('create', [ExpenseCreateController::class, 'store'])->name('expenses.store');
    Route::get('{id}/edit', [ExpenseEditController::class, 'edit'])->name('expenses.edit');
    Route::post('{id}/edit', [ExpenseEditController::class, 'update'])->name('expenses.update');
    Route::delete('{id}', [ExpenseController::class, 'delete'])->name('expenses.delete');

    Route::group(['prefix' => 'bill'], function () {
        Route::post('create', [ExpenseBillController::class, 'create'])->name('expenseBill.create');
        Route::post('store', [ExpenseBillController::class, 'store'])->name('expenseBill.store');
    });

    Route::get('lookup/category', [ExpenseLookupController::class, 'lookupCategory'])->name('expenses.lookupCategory');
    Route::get('lookup/vendor', [ExpenseLookupController::class, 'lookupVendor'])->name('expenses.lookupVendor');

    Route::post('bulk/delete', [ExpenseController::class, 'bulkDelete'])->name('expenses.bulk.delete');
});
