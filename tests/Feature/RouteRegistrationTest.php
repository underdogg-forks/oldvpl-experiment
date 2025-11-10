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

namespace Tests\Feature;

use Tests\TestCase;

class RouteRegistrationTest extends TestCase
{
    /**
     * Test that API routes are registered correctly with new syntax
     */
    public function testApiRoutesAreRegistered()
    {
        $this->assertTrue(route('api.generateKeys') !== null);
    }

    /**
     * Test that client routes are registered with correct names
     */
    public function testClientRoutesAreRegistered()
    {
        $this->assertTrue(route('clients.index') !== null);
        $this->assertTrue(route('clients.create') !== null);
        $this->assertTrue(route('clients.store') !== null);
        $this->assertTrue(route('clients.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('clients.update', ['id' => 1]) !== null);
        $this->assertTrue(route('clients.show', ['id' => 1]) !== null);
        $this->assertTrue(route('clients.delete', ['id' => 1]) !== null);
        $this->assertTrue(route('clients.ajax.lookup') !== null);
        $this->assertTrue(route('clients.ajax.modalEdit') !== null);
        $this->assertTrue(route('clients.ajax.modalLookup') !== null);
        $this->assertTrue(route('clients.ajax.modalUpdate', ['id' => 1]) !== null);
        $this->assertTrue(route('clients.ajax.checkName') !== null);
        $this->assertTrue(route('clients.ajax.checkDuplicateName') !== null);
        $this->assertTrue(route('clients.bulk.delete') !== null);
    }

    /**
     * Test that client contact routes are registered
     */
    public function testClientContactRoutesAreRegistered()
    {
        $this->assertTrue(route('clients.contacts.create', ['clientId' => 1]) !== null);
        $this->assertTrue(route('clients.contacts.store', ['clientId' => 1]) !== null);
        $this->assertTrue(route('clients.contacts.edit', ['clientId' => 1, 'contactId' => 1]) !== null);
        $this->assertTrue(route('clients.contacts.update', ['clientId' => 1, 'contactId' => 1]) !== null);
        $this->assertTrue(route('clients.contacts.delete', ['clientId' => 1]) !== null);
        $this->assertTrue(route('clients.contacts.updateDefault', ['clientId' => 1]) !== null);
    }

    /**
     * Test that invoice routes are registered with correct names
     */
    public function testInvoiceRoutesAreRegistered()
    {
        $this->assertTrue(route('invoices.index') !== null);
        $this->assertTrue(route('invoices.create') !== null);
        $this->assertTrue(route('invoices.store') !== null);
        $this->assertTrue(route('invoices.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('invoices.update', ['id' => 1]) !== null);
        $this->assertTrue(route('invoices.delete', ['id' => 1]) !== null);
        $this->assertTrue(route('invoices.pdf', ['id' => 1]) !== null);
        $this->assertTrue(route('invoiceEdit.refreshEdit', ['id' => 1]) !== null);
        $this->assertTrue(route('invoiceEdit.refreshTo') !== null);
        $this->assertTrue(route('invoiceEdit.refreshFrom') !== null);
        $this->assertTrue(route('invoiceEdit.refreshTotals') !== null);
        $this->assertTrue(route('invoiceEdit.updateClient') !== null);
        $this->assertTrue(route('invoiceEdit.updateCompanyProfile') !== null);
        $this->assertTrue(route('invoices.recalculate') !== null);
        $this->assertTrue(route('invoices.bulk.delete') !== null);
        $this->assertTrue(route('invoices.bulk.status') !== null);
    }

    /**
     * Test that invoice copy routes use kebab-case naming
     */
    public function testInvoiceCopyRoutesUseKebabCase()
    {
        $this->assertTrue(route('invoice-copy.create') !== null);
        $this->assertTrue(route('invoice-copy.store') !== null);
    }

    /**
     * Test that invoice mail routes use kebab-case naming
     */
    public function testInvoiceMailRoutesUseKebabCase()
    {
        $this->assertTrue(route('invoice-mail.create') !== null);
        $this->assertTrue(route('invoice-mail.store') !== null);
    }

    /**
     * Test that invoice item routes use kebab-case naming
     */
    public function testInvoiceItemRoutesUseKebabCase()
    {
        $this->assertTrue(route('invoice-item.delete') !== null);
    }

    /**
     * Test that quote routes are registered with correct names
     */
    public function testQuoteRoutesAreRegistered()
    {
        $this->assertTrue(route('quotes.index') !== null);
        $this->assertTrue(route('quotes.create') !== null);
        $this->assertTrue(route('quotes.store') !== null);
        $this->assertTrue(route('quotes.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('quotes.update', ['id' => 1]) !== null);
        $this->assertTrue(route('quotes.delete', ['id' => 1]) !== null);
        $this->assertTrue(route('quotes.pdf', ['id' => 1]) !== null);
        $this->assertTrue(route('quoteEdit.refreshEdit', ['id' => 1]) !== null);
        $this->assertTrue(route('quoteEdit.refreshTo') !== null);
        $this->assertTrue(route('quoteEdit.refreshFrom') !== null);
        $this->assertTrue(route('quoteEdit.refreshTotals') !== null);
        $this->assertTrue(route('quoteEdit.updateClient') !== null);
        $this->assertTrue(route('quoteEdit.updateCompanyProfile') !== null);
        $this->assertTrue(route('quotes.recalculate') !== null);
        $this->assertTrue(route('quotes.bulk.delete') !== null);
        $this->assertTrue(route('quotes.bulk.status') !== null);
    }

    /**
     * Test that quote copy routes use kebab-case naming
     */
    public function testQuoteCopyRoutesUseKebabCase()
    {
        $this->assertTrue(route('quote-copy.create') !== null);
        $this->assertTrue(route('quote-copy.store') !== null);
    }

    /**
     * Test that quote to invoice routes use kebab-case naming
     */
    public function testQuoteToInvoiceRoutesUseKebabCase()
    {
        $this->assertTrue(route('quote-to-invoice.create') !== null);
        $this->assertTrue(route('quote-to-invoice.store') !== null);
    }

    /**
     * Test that quote mail routes use kebab-case naming
     */
    public function testQuoteMailRoutesUseKebabCase()
    {
        $this->assertTrue(route('quote-mail.create') !== null);
        $this->assertTrue(route('quote-mail.store') !== null);
    }

    /**
     * Test that quote item routes use kebab-case naming
     */
    public function testQuoteItemRoutesUseKebabCase()
    {
        $this->assertTrue(route('quote-item.delete') !== null);
    }

    /**
     * Test that payment routes are registered
     */
    public function testPaymentRoutesAreRegistered()
    {
        $this->assertTrue(route('payments.index') !== null);
        $this->assertTrue(route('payments.create') !== null);
        $this->assertTrue(route('payments.store') !== null);
        $this->assertTrue(route('payments.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('payments.update', ['id' => 1]) !== null);
        $this->assertTrue(route('payments.delete', ['id' => 1]) !== null);
        $this->assertTrue(route('payments.bulk.delete') !== null);
    }

    /**
     * Test that payment mail routes use kebab-case naming
     */
    public function testPaymentMailRoutesUseKebabCase()
    {
        $this->assertTrue(route('payment-mail.create') !== null);
        $this->assertTrue(route('payment-mail.store') !== null);
    }

    /**
     * Test that recurring invoice routes are registered
     */
    public function testRecurringInvoiceRoutesAreRegistered()
    {
        $this->assertTrue(route('recurringInvoices.index') !== null);
        $this->assertTrue(route('recurringInvoices.create') !== null);
        $this->assertTrue(route('recurringInvoices.store') !== null);
        $this->assertTrue(route('recurringInvoices.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('recurringInvoices.update', ['id' => 1]) !== null);
        $this->assertTrue(route('recurringInvoices.delete', ['id' => 1]) !== null);
        $this->assertTrue(route('recurringInvoices.bulk.delete') !== null);
    }

    /**
     * Test that recurring invoice copy routes use kebab-case naming
     */
    public function testRecurringInvoiceCopyRoutesUseKebabCase()
    {
        $this->assertTrue(route('recurring-invoice-copy.create') !== null);
        $this->assertTrue(route('recurring-invoice-copy.store') !== null);
    }

    /**
     * Test that recurring invoice item routes use kebab-case naming
     */
    public function testRecurringInvoiceItemRoutesUseKebabCase()
    {
        $this->assertTrue(route('recurring-invoice-item.delete') !== null);
    }

    /**
     * Test that currency routes are registered
     */
    public function testCurrencyRoutesAreRegistered()
    {
        $this->assertTrue(route('currencies.index') !== null);
        $this->assertTrue(route('currencies.create') !== null);
        $this->assertTrue(route('currencies.store') !== null);
        $this->assertTrue(route('currencies.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('currencies.update', ['id' => 1]) !== null);
        $this->assertTrue(route('currencies.delete', ['id' => 1]) !== null);
    }

    /**
     * Test that company profile routes are registered
     */
    public function testCompanyProfileRoutesAreRegistered()
    {
        $this->assertTrue(route('companyProfiles.index') !== null);
        $this->assertTrue(route('companyProfiles.create') !== null);
        $this->assertTrue(route('companyProfiles.store') !== null);
        $this->assertTrue(route('companyProfiles.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('companyProfiles.update', ['id' => 1]) !== null);
        $this->assertTrue(route('companyProfiles.delete', ['id' => 1]) !== null);
    }

    /**
     * Test that custom field routes are registered
     */
    public function testCustomFieldRoutesAreRegistered()
    {
        $this->assertTrue(route('customFields.index') !== null);
        $this->assertTrue(route('customFields.create') !== null);
        $this->assertTrue(route('customFields.store') !== null);
        $this->assertTrue(route('customFields.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('customFields.update', ['id' => 1]) !== null);
        $this->assertTrue(route('customFields.delete', ['id' => 1]) !== null);
    }

    /**
     * Test that expense routes are registered
     */
    public function testExpenseRoutesAreRegistered()
    {
        $this->assertTrue(route('expenses.index') !== null);
        $this->assertTrue(route('expenses.create') !== null);
        $this->assertTrue(route('expenses.store') !== null);
        $this->assertTrue(route('expenses.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('expenses.update', ['id' => 1]) !== null);
        $this->assertTrue(route('expenses.delete', ['id' => 1]) !== null);
    }

    /**
     * Test that group routes are registered
     */
    public function testGroupRoutesAreRegistered()
    {
        $this->assertTrue(route('groups.index') !== null);
        $this->assertTrue(route('groups.create') !== null);
        $this->assertTrue(route('groups.store') !== null);
        $this->assertTrue(route('groups.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('groups.update', ['id' => 1]) !== null);
        $this->assertTrue(route('groups.delete', ['id' => 1]) !== null);
    }

    /**
     * Test that tax rate routes are registered
     */
    public function testTaxRateRoutesAreRegistered()
    {
        $this->assertTrue(route('taxRates.index') !== null);
        $this->assertTrue(route('taxRates.create') !== null);
        $this->assertTrue(route('taxRates.store') !== null);
        $this->assertTrue(route('taxRates.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('taxRates.update', ['id' => 1]) !== null);
        $this->assertTrue(route('taxRates.delete', ['id' => 1]) !== null);
    }

    /**
     * Test that user routes are registered
     */
    public function testUserRoutesAreRegistered()
    {
        $this->assertTrue(route('users.index') !== null);
        $this->assertTrue(route('users.create') !== null);
        $this->assertTrue(route('users.store') !== null);
        $this->assertTrue(route('users.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('users.update', ['id' => 1]) !== null);
        $this->assertTrue(route('users.delete', ['id' => 1]) !== null);
    }

    /**
     * Test that payment method routes are registered
     */
    public function testPaymentMethodRoutesAreRegistered()
    {
        $this->assertTrue(route('paymentMethods.index') !== null);
        $this->assertTrue(route('paymentMethods.create') !== null);
        $this->assertTrue(route('paymentMethods.store') !== null);
        $this->assertTrue(route('paymentMethods.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('paymentMethods.update', ['id' => 1]) !== null);
        $this->assertTrue(route('paymentMethods.delete', ['id' => 1]) !== null);
    }

    /**
     * Test that report routes are registered with correct names
     */
    public function testReportRoutesAreRegistered()
    {
        $this->assertTrue(route('reports.clientStatement') !== null);
        $this->assertTrue(route('reports.clientStatement.validate') !== null);
        $this->assertTrue(route('reports.clientStatement.html') !== null);
        $this->assertTrue(route('reports.clientStatement.pdf') !== null);

        $this->assertTrue(route('reports.itemSales') !== null);
        $this->assertTrue(route('reports.itemSales.validate') !== null);
        $this->assertTrue(route('reports.itemSales.html') !== null);
        $this->assertTrue(route('reports.itemSales.pdf') !== null);

        $this->assertTrue(route('reports.paymentsCollected') !== null);
        $this->assertTrue(route('reports.paymentsCollected.validate') !== null);
        $this->assertTrue(route('reports.paymentsCollected.html') !== null);
        $this->assertTrue(route('reports.paymentsCollected.pdf') !== null);

        $this->assertTrue(route('reports.revenueByClient') !== null);
        $this->assertTrue(route('reports.revenueByClient.validate') !== null);
        $this->assertTrue(route('reports.revenueByClient.html') !== null);
        $this->assertTrue(route('reports.revenueByClient.pdf') !== null);

        $this->assertTrue(route('reports.taxSummary') !== null);
        $this->assertTrue(route('reports.taxSummary.validate') !== null);
        $this->assertTrue(route('reports.taxSummary.html') !== null);
        $this->assertTrue(route('reports.taxSummary.pdf') !== null);

        $this->assertTrue(route('reports.profitLoss') !== null);
        $this->assertTrue(route('reports.profitLoss.validate') !== null);
        $this->assertTrue(route('reports.profitLoss.html') !== null);
        $this->assertTrue(route('reports.profitLoss.pdf') !== null);

        $this->assertTrue(route('reports.expenseList') !== null);
        $this->assertTrue(route('reports.expenseList.validate') !== null);
        $this->assertTrue(route('reports.expenseList.html') !== null);
        $this->assertTrue(route('reports.expenseList.pdf') !== null);
    }

    /**
     * Test that task routes are registered
     */
    public function testTaskRoutesAreRegistered()
    {
        $this->assertTrue(route('tasks.run') !== null);
    }

    /**
     * Test that dashboard routes are registered
     */
    public function testDashboardRoutesAreRegistered()
    {
        $this->assertTrue(route('dashboard.index') !== null);
    }

    /**
     * Test that settings routes are registered
     */
    public function testSettingsRoutesAreRegistered()
    {
        $this->assertTrue(route('settings.index') !== null);
        $this->assertTrue(route('settings.general') !== null);
        $this->assertTrue(route('settings.invoices') !== null);
        $this->assertTrue(route('settings.quotes') !== null);
        $this->assertTrue(route('settings.taxes') !== null);
        $this->assertTrue(route('settings.email') !== null);
        $this->assertTrue(route('settings.merchantAccount') !== null);
        $this->assertTrue(route('settings.online_payment') !== null);
        $this->assertTrue(route('settings.updateSetting') !== null);
    }

    /**
     * Test that mail queue routes are registered
     */
    public function testMailQueueRoutesAreRegistered()
    {
        $this->assertTrue(route('mailQueue.index') !== null);
        $this->assertTrue(route('mailQueue.delete', ['id' => 1]) !== null);
    }

    /**
     * Test that session routes are registered
     */
    public function testSessionRoutesAreRegistered()
    {
        $this->assertTrue(route('session.login') !== null);
        $this->assertTrue(route('session.store') !== null);
        $this->assertTrue(route('session.loginCheck') !== null);
        $this->assertTrue(route('session.logout') !== null);
    }

    /**
     * Test that note routes are registered
     */
    public function testNoteRoutesAreRegistered()
    {
        $this->assertTrue(route('notes.create') !== null);
        $this->assertTrue(route('notes.store') !== null);
        $this->assertTrue(route('notes.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('notes.update', ['id' => 1]) !== null);
        $this->assertTrue(route('notes.delete', ['id' => 1]) !== null);
    }

    /**
     * Test that item lookup routes are registered
     */
    public function testItemLookupRoutesAreRegistered()
    {
        $this->assertTrue(route('itemLookups.index') !== null);
        $this->assertTrue(route('itemLookups.create') !== null);
        $this->assertTrue(route('itemLookups.store') !== null);
        $this->assertTrue(route('itemLookups.edit', ['id' => 1]) !== null);
        $this->assertTrue(route('itemLookups.update', ['id' => 1]) !== null);
        $this->assertTrue(route('itemLookups.delete', ['id' => 1]) !== null);
        $this->assertTrue(route('itemLookups.ajax.lookup') !== null);
        $this->assertTrue(route('itemLookups.ajax.modalLookup') !== null);
    }

    /**
     * Test that attachment routes are registered
     */
    public function testAttachmentRoutesAreRegistered()
    {
        $this->assertTrue(route('attachments.download', ['urlKey' => 'test']) !== null);
    }

    /**
     * Test that addon routes are registered
     */
    public function testAddonRoutesAreRegistered()
    {
        $this->assertTrue(route('addons.index') !== null);
    }

    /**
     * Test that export routes are registered
     */
    public function testExportRoutesAreRegistered()
    {
        $this->assertTrue(route('exports.index') !== null);
        $this->assertTrue(route('exports.create') !== null);
    }

    /**
     * Test that import routes are registered
     */
    public function testImportRoutesAreRegistered()
    {
        $this->assertTrue(route('import.index') !== null);
        $this->assertTrue(route('import.upload') !== null);
        $this->assertTrue(route('import.process') !== null);
    }

    /**
     * Test that merchant routes are registered
     */
    public function testMerchantRoutesAreRegistered()
    {
        $this->assertTrue(route('merchant.form') !== null);
        $this->assertTrue(route('merchant.approve') !== null);
    }

    /**
     * Test that setup routes are registered
     */
    public function testSetupRoutesAreRegistered()
    {
        $this->assertTrue(route('setup.index') !== null);
        $this->assertTrue(route('setup.postIndex') !== null);
        $this->assertTrue(route('setup.configure') !== null);
        $this->assertTrue(route('setup.postConfigure') !== null);
        $this->assertTrue(route('setup.migration') !== null);
        $this->assertTrue(route('setup.postMigration') !== null);
        $this->assertTrue(route('setup.account') !== null);
        $this->assertTrue(route('setup.postAccount') !== null);
    }

    /**
     * Test that client center routes are registered
     */
    public function testClientCenterRoutesAreRegistered()
    {
        $this->assertTrue(route('clientCenter.public.quote', ['urlKey' => 'test']) !== null);
        $this->assertTrue(route('clientCenter.public.invoice', ['urlKey' => 'test']) !== null);
        $this->assertTrue(route('clientCenter.public.invoice.pdf', ['urlKey' => 'test']) !== null);
    }
}