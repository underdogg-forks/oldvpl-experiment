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
use Illuminate\Support\Facades\Route;

class RouteMethodTest extends TestCase
{
    /**
     * Test that delete routes use proper DELETE HTTP method instead of GET
     */
    public function testClientDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('clients.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that invoice delete uses proper DELETE method
     */
    public function testInvoiceDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('invoices.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that quote delete uses proper DELETE method
     */
    public function testQuoteDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('quotes.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that payment delete uses proper DELETE method
     */
    public function testPaymentDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('payments.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that recurring invoice delete uses proper DELETE method
     */
    public function testRecurringInvoiceDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('recurringInvoices.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that currency delete uses proper DELETE method
     */
    public function testCurrencyDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('currencies.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that company profile delete uses proper DELETE method
     */
    public function testCompanyProfileDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('companyProfiles.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that custom field delete uses proper DELETE method
     */
    public function testCustomFieldDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('customFields.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that expense delete uses proper DELETE method
     */
    public function testExpenseDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('expenses.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that group delete uses proper DELETE method
     */
    public function testGroupDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('groups.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that tax rate delete uses proper DELETE method
     */
    public function testTaxRateDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('taxRates.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that user delete uses proper DELETE method
     */
    public function testUserDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('users.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that payment method delete uses proper DELETE method
     */
    public function testPaymentMethodDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('paymentMethods.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that note delete uses proper DELETE method
     */
    public function testNoteDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('notes.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that item lookup delete uses proper DELETE method
     */
    public function testItemLookupDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('itemLookups.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that mail queue delete uses proper DELETE method
     */
    public function testMailQueueDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('mailQueue.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that client contact delete uses proper DELETE method
     */
    public function testClientContactDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('clients.contacts.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that invoice item delete uses proper DELETE method
     */
    public function testInvoiceItemDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('invoice-item.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that quote item delete uses proper DELETE method
     */
    public function testQuoteItemDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('quote-item.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that recurring invoice item delete uses proper DELETE method
     */
    public function testRecurringInvoiceItemDeleteUsesDeleteMethod()
    {
        $route = Route::getRoutes()->getByName('recurring-invoice-item.delete');
        $this->assertNotNull($route);
        $this->assertTrue(in_array('DELETE', $route->methods()));
        $this->assertFalse(in_array('GET', $route->methods()));
    }

    /**
     * Test that POST routes remain POST
     */
    public function testPostRoutesRemainPost()
    {
        $postRoutes = [
            'clients.store',
            'clients.ajax.modalEdit',
            'clients.bulk.delete',
            'invoices.store',
            'invoices.recalculate',
            'quotes.store',
            'payments.store',
            'invoice-copy.create',
            'invoice-mail.create',
            'quote-copy.create',
            'payment-mail.create',
        ];

        foreach ($postRoutes as $routeName) {
            $route = Route::getRoutes()->getByName($routeName);
            $this->assertNotNull($route, "Route {$routeName} should exist");
            $this->assertTrue(in_array('POST', $route->methods()), "Route {$routeName} should accept POST");
        }
    }

    /**
     * Test that GET routes remain GET
     */
    public function testGetRoutesRemainGet()
    {
        $getRoutes = [
            'clients.index',
            'clients.create',
            'clients.show',
            'invoices.index',
            'invoices.create',
            'invoices.pdf',
            'quotes.index',
            'quotes.create',
            'payments.index',
            'dashboard.index',
        ];

        foreach ($getRoutes as $routeName) {
            $route = Route::getRoutes()->getByName($routeName);
            $this->assertNotNull($route, "Route {$routeName} should exist");
            $this->assertTrue(in_array('GET', $route->methods()), "Route {$routeName} should accept GET");
            $this->assertTrue(in_array('HEAD', $route->methods()), "Route {$routeName} should accept HEAD");
        }
    }

    /**
     * Test route action uses class-based syntax
     */
    public function testRoutesUseClassBasedActions()
    {
        $route = Route::getRoutes()->getByName('clients.index');
        $this->assertNotNull($route);

        $action = $route->getAction();
        $this->assertArrayHasKey('controller', $action);

        // Ensure it's using the class reference, not string
        $controller = $action['controller'];
        $this->assertStringContainsString('Modules\Clients\Controllers\ClientController', $controller);
    }

    /**
     * Test that routes have proper middleware applied
     */
    public function testAdminRoutesHaveAuthMiddleware()
    {
        $adminRoutes = [
            'clients.index',
            'invoices.index',
            'quotes.index',
            'payments.index',
            'settings.index',
        ];

        foreach ($adminRoutes as $routeName) {
            $route = Route::getRoutes()->getByName($routeName);
            $this->assertNotNull($route, "Route {$routeName} should exist");

            $middleware = $route->middleware();
            $this->assertTrue(
                in_array('web', $middleware) || in_array('auth.admin', $middleware),
                "Route {$routeName} should have web or auth.admin middleware"
            );
        }
    }

    /**
     * Test API routes have correct middleware
     */
    public function testApiRoutesHaveCorrectMiddleware()
    {
        $route = Route::getRoutes()->getByName('api.generateKeys');
        $this->assertNotNull($route);

        $middleware = $route->middleware();
        $this->assertTrue(
            in_array('web', $middleware) && in_array('auth.admin', $middleware),
            "API generate keys route should have both web and auth.admin middleware"
        );
    }
}