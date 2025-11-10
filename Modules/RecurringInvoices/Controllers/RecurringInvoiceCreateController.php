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

namespace Modules\RecurringInvoices\Controllers;

use App\Http\Controllers\Controller;
use Modules\Clients\Models\Client;
use Modules\CompanyProfiles\Models\CompanyProfile;
use Modules\Groups\Models\Group;
use Modules\RecurringInvoices\Models\RecurringInvoice;
use Modules\RecurringInvoices\Requests\RecurringInvoiceStoreRequest;
use App\Support\DateFormatter;
use App\Support\Frequency;

class RecurringInvoiceCreateController extends Controller
{
    public function create()
    {
        return view('recurring_invoices._modal_create')
            ->with('companyProfiles', CompanyProfile::getList())
            ->with('groups', Group::getList())
            ->with('frequencies', Frequency::lists());
    }

    public function store(RecurringInvoiceStoreRequest $request)
    {
        $input = $request->except('client_name');

        $input['client_id'] = Client::firstOrCreateByUniqueName($request->input('client_name'))->id;
        $input['next_date'] = DateFormatter::unformat($input['next_date']);
        $input['stop_date'] = ($input['stop_date']) ? DateFormatter::unformat($input['stop_date']) : '0000-00-00';

        $recurringInvoice = RecurringInvoice::create($input);

        return response()->json(['success' => true, 'url' => route('recurringInvoices.edit', [$recurringInvoice->id])], 200);
    }
}