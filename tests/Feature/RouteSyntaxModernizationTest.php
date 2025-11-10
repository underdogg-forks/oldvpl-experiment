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

class RouteSyntaxModernizationTest extends TestCase
{
    /**
     * Test that all routes use array-based controller references
     */
    public function testRoutesUseArrayControllerSyntax()
    {
        $routes = Route::getRoutes();
        $stringControllers = [];

        foreach ($routes->getRoutes() as $route) {
            $action = $route->getAction();
            
            if (isset($action['controller'])) {
                $controller = $action['controller'];
                
                // Check if it's using old string-based syntax like 'Controller@method'
                if (is_string($controller) && strpos($controller, '@') !== false) {
                    $stringControllers[] = [
                        'name' => $route->getName(),
                        'uri' => $route->uri(),
                        'controller' => $controller
                    ];
                }
            }
        }

        $this->assertEmpty(
            $stringControllers,
            'Found routes using old string-based controller syntax: ' . json_encode($stringControllers)
        );
    }

    /**
     * Test that route names follow consistent naming conventions
     */
    public function testRouteNamesFollowConventions()
    {
        $routes = Route::getRoutes();
        $inconsistentNames = [];

        foreach ($routes->getRoutes() as $route) {
            $name = $route->getName();
            
            if (!$name) {
                continue;
            }

            // Check for specific patterns that should use kebab-case
            $kebabCasePatterns = [
                'copy', 'mail', 'item', 'invoice', 'quote', 'payment'
            ];

            foreach ($kebabCasePatterns as $pattern) {
                // Check if name contains camelCase compound words that should be kebab-case
                if (preg_match('/[a-z]' . ucfirst($pattern) . '/', $name)) {
                    $inconsistentNames[] = $name;
                }
            }
        }

        $this->assertEmpty(
            $inconsistentNames,
            'Found routes with inconsistent naming (should use kebab-case): ' . implode(', ', $inconsistentNames)
        );
    }

    /**
     * Test that route URIs are properly structured
     */
    public function testRouteUrisAreProperlyStructured()
    {
        $routes = Route::getRoutes();
        $malformedUris = [];

        foreach ($routes->getRoutes() as $route) {
            $uri = $route->uri();
            
            // Check for double slashes (excluding protocol slashes)
            if (preg_match('/[^:]\/\//', $uri)) {
                $malformedUris[] = [
                    'name' => $route->getName(),
                    'uri' => $uri,
                    'issue' => 'double slashes'
                ];
            }
            
            // Check for trailing slashes (except root)
            if ($uri !== '/' && substr($uri, -1) === '/') {
                $malformedUris[] = [
                    'name' => $route->getName(),
                    'uri' => $uri,
                    'issue' => 'trailing slash'
                ];
            }
        }

        $this->assertEmpty(
            $malformedUris,
            'Found routes with malformed URIs: ' . json_encode($malformedUris)
        );
    }

    /**
     * Test that kebab-case route names are properly registered
     */
    public function testKebabCaseRoutesAreRegistered()
    {
        $expectedKebabRoutes = [
            'invoice-copy.create',
            'invoice-copy.store',
            'invoice-mail.create',
            'invoice-mail.store',
            'invoice-item.delete',
            'quote-copy.create',
            'quote-copy.store',
            'quote-mail.create',
            'quote-mail.store',
            'quote-item.delete',
            'quote-to-invoice.create',
            'quote-to-invoice.store',
            'payment-mail.create',
            'payment-mail.store',
            'recurring-invoice-copy.create',
            'recurring-invoice-copy.store',
            'recurring-invoice-item.delete',
        ];

        foreach ($expectedKebabRoutes as $routeName) {
            $route = Route::getRoutes()->getByName($routeName);
            $this->assertNotNull(
                $route,
                "Expected kebab-case route '{$routeName}' should be registered"
            );
        }
    }

    /**
     * Test that old camelCase routes are not registered
     */
    public function testOldCamelCaseRoutesAreNotRegistered()
    {
        $oldCamelCaseRoutes = [
            'invoiceCopy.create',
            'invoiceCopy.store',
            'invoiceMail.create',
            'invoiceMail.store',
            'invoiceItem.delete',
            'quoteCopy.create',
            'quoteCopy.store',
            'quoteMail.create',
            'quoteMail.store',
            'quoteItem.delete',
            'quoteToInvoice.create',
            'quoteToInvoice.store',
            'paymentMail.create',
            'paymentMail.store',
            'recurringInvoiceCopy.create',
            'recurringInvoiceCopy.store',
            'recurringInvoiceItem.delete',
        ];

        $foundOldRoutes = [];
        foreach ($oldCamelCaseRoutes as $routeName) {
            $route = Route::getRoutes()->getByName($routeName);
            if ($route !== null) {
                $foundOldRoutes[] = $routeName;
            }
        }

        $this->assertEmpty(
            $foundOldRoutes,
            'Found old camelCase routes that should have been renamed: ' . implode(', ', $foundOldRoutes)
        );
    }

    /**
     * Test that route groups have proper middleware configuration
     */
    public function testRouteGroupsHaveProperMiddleware()
    {
        $middlewareTests = [
            [
                'route' => 'invoices.index',
                'expected' => ['web', 'auth.admin'],
                'description' => 'Invoice routes should have web and auth.admin middleware'
            ],
            [
                'route' => 'clients.index',
                'expected' => ['web', 'auth.admin'],
                'description' => 'Client routes should have web and auth.admin middleware'
            ],
            [
                'route' => 'quotes.index',
                'expected' => ['web', 'auth.admin'],
                'description' => 'Quote routes should have web and auth.admin middleware'
            ],
            [
                'route' => 'api.generateKeys',
                'expected' => ['web', 'auth.admin'],
                'description' => 'API key generation should have web and auth.admin middleware'
            ],
        ];

        foreach ($middlewareTests as $test) {
            $route = Route::getRoutes()->getByName($test['route']);
            $this->assertNotNull($route, "Route {$test['route']} should exist");
            
            $middleware = $route->middleware();
            foreach ($test['expected'] as $expectedMiddleware) {
                $this->assertTrue(
                    in_array($expectedMiddleware, $middleware),
                    $test['description'] . " (missing: {$expectedMiddleware})"
                );
            }
        }
    }

    /**
     * Test that routes without namespaces still resolve correctly
     */
    public function testRoutesResolveWithoutNamespaceAttribute()
    {
        $sampleRoutes = [
            'clients.index' => 'Modules\Clients\Controllers\ClientController',
            'invoices.index' => 'Modules\Invoices\Controllers\InvoiceController',
            'quotes.index' => 'Modules\Quotes\Controllers\QuoteController',
            'payments.index' => 'Modules\Payments\Controllers\PaymentController',
        ];

        foreach ($sampleRoutes as $routeName => $expectedController) {
            $route = Route::getRoutes()->getByName($routeName);
            $this->assertNotNull($route, "Route {$routeName} should exist");
            
            $action = $route->getAction();
            $this->assertArrayHasKey('controller', $action);
            
            $controller = $action['controller'];
            $this->assertStringContainsString(
                $expectedController,
                $controller,
                "Route {$routeName} should resolve to {$expectedController}"
            );
            
            // Ensure no 'namespace' key in route action (moved to use statements)
            $this->assertArrayNotHasKey(
                'namespace',
                $action,
                "Route {$routeName} should not have 'namespace' attribute (should use imports)"
            );
        }
    }

    /**
     * Test route parameter naming consistency
     */
    public function testRouteParameterNamingConsistency()
    {
        $routes = Route::getRoutes();
        $inconsistentParams = [];

        foreach ($routes->getRoutes() as $route) {
            $params = $route->parameterNames();
            
            foreach ($params as $param) {
                // Check if parameter uses snake_case or camelCase consistently
                if (strpos($param, '-') !== false) {
                    $inconsistentParams[] = [
                        'route' => $route->getName(),
                        'uri' => $route->uri(),
                        'param' => $param,
                        'issue' => 'uses kebab-case instead of snake_case or camelCase'
                    ];
                }
            }
        }

        // Note: This is informational - kebab-case in URL params is sometimes acceptable
        // but we want to ensure consistency across the application
        $this->assertLessThanOrEqual(
            0,
            count($inconsistentParams),
            'Route parameters should use consistent naming: ' . json_encode($inconsistentParams)
        );
    }

    /**
     * Test that all route files have been updated to new syntax
     */
    public function testAllRouteFilesUpdated()
    {
        $routeFiles = [
            'Modules/API/routes.php',
            'Modules/Clients/routes.php',
            'Modules/Invoices/routes.php',
            'Modules/Quotes/routes.php',
            'Modules/Payments/routes.php',
            'Modules/RecurringInvoices/routes.php',
            'Modules/Currencies/routes.php',
            'Modules/CompanyProfiles/routes.php',
            'Modules/CustomFields/routes.php',
            'Modules/Expenses/routes.php',
            'Modules/Groups/routes.php',
            'Modules/TaxRates/routes.php',
            'Modules/Users/routes.php',
            'Modules/PaymentMethods/routes.php',
            'Modules/Reports/routes.php',
            'Modules/Tasks/routes.php',
            'Modules/Dashboard/routes.php',
            'Modules/Settings/routes.php',
            'Modules/MailQueue/routes.php',
            'Modules/Sessions/routes.php',
            'Modules/Notes/routes.php',
            'Modules/ItemLookups/routes.php',
        ];

        $filesWithOldSyntax = [];

        foreach ($routeFiles as $file) {
            $path = base_path($file);
            if (!file_exists($path)) {
                continue;
            }

            $content = file_get_contents($path);

            // Check for old array syntax: ['uses' => 'Controller@method', 'as' => 'name']
            if (preg_match("/['\"]\s*uses\s*['\"]\\s*=>\\s*['\"]/", $content)) {
                $filesWithOldSyntax[] = $file . ' (uses old "uses" array syntax)';
            }

            // Check for old namespace in route group
            if (preg_match("/['\"]\s*namespace\s*['\"]\\s*=>\\s*['\"]/", $content)) {
                $filesWithOldSyntax[] = $file . ' (has namespace in route group)';
            }

            // Check for string-based controller references like 'Controller@method'
            if (preg_match("/['\"][A-Za-z]+Controller@[a-z]+['\"]/", $content)) {
                $filesWithOldSyntax[] = $file . ' (uses string controller syntax)';
            }
        }

        $this->assertEmpty(
            $filesWithOldSyntax,
            'Found route files with old syntax that need updating: ' . implode(', ', $filesWithOldSyntax)
        );
    }
}