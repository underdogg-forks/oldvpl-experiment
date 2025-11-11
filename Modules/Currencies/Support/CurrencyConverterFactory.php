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

namespace Modules\Currencies\Support;

use InvalidArgumentException;

/**
 * Currency Converter Factory
 * 
 * Creates currency converter instances based on configuration.
 * Follows the Factory pattern for object creation.
 */
class CurrencyConverterFactory
{
    /**
     * Create a currency converter instance.
     *
     * @return object
     * @throws \InvalidArgumentException
     */
    public static function create(): object
    {
        $driver = config('ip.currency_conversion_driver');
        
        if (empty($driver)) {
            throw new InvalidArgumentException('Currency conversion driver not configured');
        }

        $className = 'Modules\Currencies\Support\Drivers\\' . $driver;

        if (!class_exists($className)) {
            throw new InvalidArgumentException("Currency converter driver '{$driver}' not found");
        }

        return new $className();
    }
}
