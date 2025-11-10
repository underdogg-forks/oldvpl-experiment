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

namespace Modules\Reports\Controllers;

use App\Http\Controllers\Controller;
use Modules\Reports\Reports\ItemSalesReport;
use Modules\Reports\Requests\DateRangeRequest;
use App\Support\PDF\PDFFactory;

class ItemSalesReportController extends Controller
{
    private $report;

    public function __construct(ItemSalesReport $report)
    {
        $this->report = $report;
    }

    public function index()
    {
        return view('reports.options.item_sales');
    }

    public function validateOptions(DateRangeRequest $request)
    {

    }

    public function html()
    {
        $results = $this->report->getResults(
            request('from_date'),
            request('to_date'),
            request('company_profile_id')
        );

        return view('reports.output.item_sales')
            ->with('results', $results);
    }

    public function pdf()
    {
        $pdf = PDFFactory::create();

        $results = $this->report->getResults(
            request('from_date'),
            request('to_date'),
            request('company_profile_id')
        );

        $html = view('reports.output.item_sales')
            ->with('results', $results)->render();

        $pdf->download($html, trans('ip.item_sales') . '.pdf');
    }
}