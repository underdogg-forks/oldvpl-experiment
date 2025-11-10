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

namespace Modules\Quotes\Controllers;

use App\Http\Controllers\Controller;
use Modules\Groups\Models\Group;
use Modules\Quotes\Models\Quote;
use Modules\Quotes\Requests\QuoteToInvoiceRequest;
use Modules\Quotes\Support\QuoteToInvoice;
use App\Support\DateFormatter;

class QuoteToInvoiceController extends Controller
{
    private $quoteToInvoice;

    public function __construct(QuoteToInvoice $quoteToInvoice)
    {
        $this->quoteToInvoice = $quoteToInvoice;
    }

    public function create()
    {
        return view('quotes._modal_quote_to_invoice')
            ->with('quote_id', request('quote_id'))
            ->with('client_id', request('client_id'))
            ->with('groups', Group::getList())
            ->with('user_id', auth()->user()->id)
            ->with('invoice_date', DateFormatter::format());
    }

    public function store(QuoteToInvoiceRequest $request)
    {
        $quote = Quote::find($request->input('quote_id'));

        $invoice = $this->quoteToInvoice->convert(
            $quote,
            DateFormatter::unformat($request->input('invoice_date')),
            DateFormatter::incrementDateByDays(DateFormatter::unformat($request->input('invoice_date')), config('fi.invoicesDueAfter')),
            $request->input('group_id')
        );

        return response()->json(['redirectTo' => route('invoices.edit', ['invoice' => $invoice->id])], 200);
    }
}