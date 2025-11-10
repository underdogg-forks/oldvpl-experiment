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

use Modules\Reports\Controllers\ClientStatementReportController;
use Modules\Reports\Controllers\ExpenseListReportController;
use Modules\Reports\Controllers\ItemSalesReportController;
use Modules\Reports\Controllers\PaymentsCollectedReportController;
use Modules\Reports\Controllers\ProfitLossReportController;
use Modules\Reports\Controllers\RevenueByClientReportController;
use Modules\Reports\Controllers\TaxSummaryReportController;

Route::group(['prefix' => 'report', 'middleware' => ['web', 'auth.admin']], function () {
    Route::get('client_statement', [ClientStatementReportController::class, 'index'])->name('reports.clientStatement');
    Route::post('client_statement/validate', [ClientStatementReportController::class, 'validateOptions'])->name('reports.clientStatement.validate');
    Route::get('client_statement/html', [ClientStatementReportController::class, 'html'])->name('reports.clientStatement.html');
    Route::get('client_statement/pdf', [ClientStatementReportController::class, 'pdf'])->name('reports.clientStatement.pdf');

    Route::get('item_sales', [ItemSalesReportController::class, 'index'])->name('reports.itemSales');
    Route::post('item_sales/validate', [ItemSalesReportController::class, 'validateOptions'])->name('reports.itemSales.validate');
    Route::get('item_sales/html', [ItemSalesReportController::class, 'html'])->name('reports.itemSales.html');
    Route::get('item_sales/pdf', [ItemSalesReportController::class, 'pdf'])->name('reports.itemSales.pdf');

    Route::get('payments_collected', [PaymentsCollectedReportController::class, 'index'])->name('reports.paymentsCollected');
    Route::post('payments_collected/validate', [PaymentsCollectedReportController::class, 'validateOptions'])->name('reports.paymentsCollected.validate');
    Route::get('payments_collected/html', [PaymentsCollectedReportController::class, 'html'])->name('reports.paymentsCollected.html');
    Route::get('payments_collected/pdf', [PaymentsCollectedReportController::class, 'pdf'])->name('reports.paymentsCollected.pdf');

    Route::get('revenue_by_client', [RevenueByClientReportController::class, 'index'])->name('reports.revenueByClient');
    Route::post('revenue_by_client/validate', [RevenueByClientReportController::class, 'validateOptions'])->name('reports.revenueByClient.validate');
    Route::get('revenue_by_client/html', [RevenueByClientReportController::class, 'html'])->name('reports.revenueByClient.html');
    Route::get('revenue_by_client/pdf', [RevenueByClientReportController::class, 'pdf'])->name('reports.revenueByClient.pdf');

    Route::get('tax_summary', [TaxSummaryReportController::class, 'index'])->name('reports.taxSummary');
    Route::post('tax_summary/validate', [TaxSummaryReportController::class, 'validateOptions'])->name('reports.taxSummary.validate');
    Route::get('tax_summary/html', [TaxSummaryReportController::class, 'html'])->name('reports.taxSummary.html');
    Route::get('tax_summary/pdf', [TaxSummaryReportController::class, 'pdf'])->name('reports.taxSummary.pdf');

    Route::get('profit_loss', [ProfitLossReportController::class, 'index'])->name('reports.profitLoss');
    Route::post('profit_loss/validate', [ProfitLossReportController::class, 'validateOptions'])->name('reports.profitLoss.validate');
    Route::get('profit_loss/html', [ProfitLossReportController::class, 'html'])->name('reports.profitLoss.html');
    Route::get('profit_loss/pdf', [ProfitLossReportController::class, 'pdf'])->name('reports.profitLoss.pdf');

    Route::get('expense_list', [ExpenseListReportController::class, 'index'])->name('reports.expenseList');
    Route::post('expense_list/validate', [ExpenseListReportController::class, 'validateOptions'])->name('reports.expenseList.validate');
    Route::get('expense_list/html', [ExpenseListReportController::class, 'html'])->name('reports.expenseList.html');
    Route::get('expense_list/pdf', [ExpenseListReportController::class, 'pdf'])->name('reports.expenseList.pdf');
});
