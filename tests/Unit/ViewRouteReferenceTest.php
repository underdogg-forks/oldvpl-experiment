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

namespace Tests\Unit;

use Tests\TestCase;

class ViewRouteReferenceTest extends TestCase
{
    /**
     * Test that invoice copy view uses correct kebab-case route names
     */
    public function testInvoiceCopyViewUsesKebabCaseRoutes()
    {
        $viewPath = base_path('Modules/Invoices/Views/invoices/_js_copy.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route name
        $this->assertStringContainsString("route('invoice-copy.store')", $content);
        
        // Should NOT use camelCase route name
        $this->assertStringNotContainsString("route('invoiceCopy.store')", $content);
    }

    /**
     * Test that invoice edit view uses correct kebab-case route names
     */
    public function testInvoiceEditViewUsesKebabCaseRoutes()
    {
        $viewPath = base_path('Modules/Invoices/Views/invoices/_js_edit.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route names
        $this->assertStringContainsString("route('invoice-copy.create')", $content);
        $this->assertStringContainsString("route('invoice-item.delete')", $content);
        
        // Should NOT use camelCase route names
        $this->assertStringNotContainsString("route('invoiceCopy.create')", $content);
        $this->assertStringNotContainsString("route('invoiceItem.delete')", $content);
    }

    /**
     * Test that invoice mail view uses correct kebab-case route name
     */
    public function testInvoiceMailViewUsesKebabCaseRoute()
    {
        $viewPath = base_path('Modules/Invoices/Views/invoices/_js_mail.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route name
        $this->assertStringContainsString("route('invoice-mail.store')", $content);
        
        // Should NOT use camelCase route name
        $this->assertStringNotContainsString("route('invoiceMail.store')", $content);
    }

    /**
     * Test that quote copy view uses correct kebab-case route name
     */
    public function testQuoteCopyViewUsesKebabCaseRoute()
    {
        $viewPath = base_path('Modules/Quotes/Views/quotes/_js_copy.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route name
        $this->assertStringContainsString("route('quote-copy.store')", $content);
        
        // Should NOT use camelCase route name
        $this->assertStringNotContainsString("route('quoteCopy.store')", $content);
    }

    /**
     * Test that quote edit view uses correct kebab-case route names
     */
    public function testQuoteEditViewUsesKebabCaseRoutes()
    {
        $viewPath = base_path('Modules/Quotes/Views/quotes/_js_edit.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route names
        $this->assertStringContainsString("route('quote-copy.create')", $content);
        $this->assertStringContainsString("route('quote-to-invoice.create')", $content);
        $this->assertStringContainsString("route('quote-item.delete')", $content);
        
        // Should NOT use camelCase route names
        $this->assertStringNotContainsString("route('quoteCopy.create')", $content);
        $this->assertStringNotContainsString("route('quoteToInvoice.create')", $content);
        $this->assertStringNotContainsString("route('quoteItem.delete')", $content);
    }

    /**
     * Test that quote mail view uses correct kebab-case route name
     */
    public function testQuoteMailViewUsesKebabCaseRoute()
    {
        $viewPath = base_path('Modules/Quotes/Views/quotes/_js_mail.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route name
        $this->assertStringContainsString("route('quote-mail.store')", $content);
        
        // Should NOT use camelCase route name
        $this->assertStringNotContainsString("route('quoteMail.store')", $content);
    }

    /**
     * Test that quote to invoice view uses correct kebab-case route name
     */
    public function testQuoteToInvoiceViewUsesKebabCaseRoute()
    {
        $viewPath = base_path('Modules/Quotes/Views/quotes/_js_quote_to_invoice.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route name
        $this->assertStringContainsString("route('quote-to-invoice.store')", $content);
        
        // Should NOT use camelCase route name
        $this->assertStringNotContainsString("route('quoteToInvoice.store')", $content);
    }

    /**
     * Test that recurring invoice copy view uses correct kebab-case route name
     */
    public function testRecurringInvoiceCopyViewUsesKebabCaseRoute()
    {
        $viewPath = base_path('Modules/RecurringInvoices/Views/recurring_invoices/_js_copy.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route name
        $this->assertStringContainsString("route('recurring-invoice-copy.store')", $content);
        
        // Should NOT use camelCase route name
        $this->assertStringNotContainsString("route('recurringInvoiceCopy.store')", $content);
    }

    /**
     * Test that recurring invoice edit view uses correct kebab-case route name
     */
    public function testRecurringInvoiceEditViewUsesKebabCaseRoute()
    {
        $viewPath = base_path('Modules/RecurringInvoices/Views/recurring_invoices/_js_edit.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route name
        $this->assertStringContainsString("route('recurring-invoice-item.delete')", $content);
        
        // Should NOT use camelCase route name
        $this->assertStringNotContainsString("route('recurringInvoiceItem.delete')", $content);
    }

    /**
     * Test that payment mail view uses correct kebab-case route name
     */
    public function testPaymentMailViewUsesKebabCaseRoute()
    {
        $viewPath = base_path('Modules/Payments/Views/payments/_js_mail.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route name
        $this->assertStringContainsString("route('payment-mail.store')", $content);
        
        // Should NOT use camelCase route name
        $this->assertStringNotContainsString("route('paymentMail.store')", $content);
    }

    /**
     * Test that payments index view uses correct kebab-case route name
     */
    public function testPaymentsIndexViewUsesKebabCaseRoute()
    {
        $viewPath = base_path('Modules/Payments/Views/payments/index.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route name
        $this->assertStringContainsString("route('payment-mail.create')", $content);
        
        // Should NOT use camelCase route name
        $this->assertStringNotContainsString("route('paymentMail.create')", $content);
    }

    /**
     * Test that currencies index view uses proper DELETE form submission
     */
    public function testCurrenciesIndexViewUsesDeleteForm()
    {
        $viewPath = base_path('Modules/Currencies/Views/currencies/index.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use form-based deletion with @method('DELETE')
        $this->assertStringContainsString("@method('DELETE')", $content);
        $this->assertStringContainsString('method="POST"', $content);
        $this->assertStringContainsString('@csrf', $content);
        
        // Should use preventDefault() in onclick
        $this->assertStringContainsString('event.preventDefault()', $content);
        $this->assertStringContainsString('.submit()', $content);
    }

    /**
     * Test that mail queue index view uses proper DELETE form submission
     */
    public function testMailQueueIndexViewUsesDeleteForm()
    {
        $viewPath = base_path('Modules/MailQueue/Views/mail_log/index.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use form-based deletion with @method('DELETE')
        $this->assertStringContainsString("@method('DELETE')", $content);
        $this->assertStringContainsString('method="POST"', $content);
        $this->assertStringContainsString('@csrf', $content);
    }

    /**
     * Test that global JavaScript uses correct kebab-case route names
     */
    public function testGlobalJsViewUsesKebabCaseRoutes()
    {
        $viewPath = base_path('Modules/Layouts/Views/layouts/_js_global.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Should use kebab-case route names for client modal operations
        $this->assertStringContainsString("route('clients.ajax.modalLookup')", $content);
        $this->assertStringContainsString("route('clients.ajax.modalEdit')", $content);
    }

    /**
     * Test that old camelCase route patterns are not present in updated views
     */
    public function testNoCamelCaseRoutePatternsInUpdatedViews()
    {
        $viewsToCheck = [
            'Modules/Invoices/Views/invoices/_js_copy.blade.php',
            'Modules/Invoices/Views/invoices/_js_edit.blade.php',
            'Modules/Invoices/Views/invoices/_js_mail.blade.php',
            'Modules/Quotes/Views/quotes/_js_copy.blade.php',
            'Modules/Quotes/Views/quotes/_js_edit.blade.php',
            'Modules/Quotes/Views/quotes/_js_mail.blade.php',
            'Modules/Quotes/Views/quotes/_js_quote_to_invoice.blade.php',
            'Modules/Payments/Views/payments/_js_mail.blade.php',
            'Modules/Payments/Views/payments/index.blade.php',
            'Modules/RecurringInvoices/Views/recurring_invoices/_js_copy.blade.php',
            'Modules/RecurringInvoices/Views/recurring_invoices/_js_edit.blade.php',
        ];

        $oldPatterns = [
            'invoiceCopy',
            'invoiceItem',
            'invoiceMail',
            'quoteCopy',
            'quoteItem',
            'quoteMail',
            'quoteToInvoice',
            'paymentMail',
            'recurringInvoiceCopy',
            'recurringInvoiceItem',
        ];

        foreach ($viewsToCheck as $viewPath) {
            $fullPath = base_path($viewPath);
            if (!file_exists($fullPath)) {
                continue;
            }
            
            $content = file_get_contents($fullPath);
            
            foreach ($oldPatterns as $pattern) {
                $this->assertStringNotContainsString(
                    "route('{$pattern}.",
                    $content,
                    "View {$viewPath} should not contain old camelCase route pattern '{$pattern}'"
                );
            }
        }
    }

    /**
     * Test that views properly escape JavaScript route outputs
     */
    public function testViewsProperlyEscapeRouteOutputs()
    {
        $viewPath = base_path('Modules/Invoices/Views/invoices/_js_copy.blade.php');
        $this->assertFileExists($viewPath);
        
        $content = file_get_contents($viewPath);
        
        // Routes in JavaScript should be wrapped in {{ }} for proper escaping
        $this->assertMatchesRegularExpression(
            "/\\{\\{\\s*route\\(/",
            $content,
            "Routes should use {{ }} blade syntax for proper escaping"
        );
    }

    /**
     * Test that DELETE forms include CSRF protection
     */
    public function testDeleteFormsIncludeCsrfProtection()
    {
        $viewsWithDeleteForms = [
            'Modules/Currencies/Views/currencies/index.blade.php',
            'Modules/MailQueue/Views/mail_log/index.blade.php',
        ];

        foreach ($viewsWithDeleteForms as $viewPath) {
            $fullPath = base_path($viewPath);
            if (!file_exists($fullPath)) {
                continue;
            }
            
            $content = file_get_contents($fullPath);
            
            // Check for CSRF token
            $this->assertStringContainsString(
                '@csrf',
                $content,
                "View {$viewPath} should include @csrf for DELETE forms"
            );
        }
    }

    /**
     * Test that DELETE forms use proper method spoofing
     */
    public function testDeleteFormsUseMethodSpoofing()
    {
        $viewsWithDeleteForms = [
            'Modules/Currencies/Views/currencies/index.blade.php',
            'Modules/MailQueue/Views/mail_log/index.blade.php',
        ];

        foreach ($viewsWithDeleteForms as $viewPath) {
            $fullPath = base_path($viewPath);
            if (!file_exists($fullPath)) {
                continue;
            }
            
            $content = file_get_contents($fullPath);
            
            // Check for method spoofing
            $this->assertStringContainsString(
                "@method('DELETE')",
                $content,
                "View {$viewPath} should include @method('DELETE') for proper HTTP method spoofing"
            );
        }
    }
}