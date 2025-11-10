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

namespace App\Composers;

use Modules\Currencies\Models\Currency;
use Modules\Invoices\Support\InvoiceTemplates;
use Modules\Quotes\Support\QuoteTemplates;
use App\Support\Languages;

class ClientFormComposer
{
    public function compose($view)
    {
        $view->with('currencies', Currency::getList())
            ->with('invoiceTemplates', InvoiceTemplates::lists())
            ->with('quoteTemplates', QuoteTemplates::lists())
            ->with('languages', Languages::listLanguages());
    }
}
