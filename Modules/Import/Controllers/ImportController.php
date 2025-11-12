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

namespace Modules\Import\Controllers;

use App\Http\Controllers\Controller;
use Modules\Import\Importers\ImportFactory;
use Modules\Import\Requests\ImportRequest;

class ImportController extends Controller
{
    public function index()
    {
        $importTypes = [
            'clients' => trans('ip.clients'),
            'quotes' => trans('ip.quotes'),
            'quoteItems' => trans('ip.quote_items'),
            'invoices' => trans('ip.invoices'),
            'invoiceItems' => trans('ip.invoice_items'),
            'payments' => trans('ip.payments'),
            'expenses' => trans('ip.expenses'),
            'itemLookups' => trans('ip.item_lookups'),
        ];

        return view('import.index')
            ->with('importTypes', $importTypes);
    }

    public function upload(ImportRequest $request)
    {
        // Validate import_type against allowed types to prevent path traversal
        $allowedTypes = ['clients', 'quotes', 'quoteItems', 'invoices', 'invoiceItems', 'payments', 'expenses', 'itemLookups'];
        $importType = $request->input('import_type');

        if (! in_array($importType, $allowedTypes)) {
            abort(400, 'Invalid import type');
        }

        // Use storeAs with sanitized filename to prevent path traversal
        $fileName = $importType.'.csv';
        $request->file('import_file')->storeAs('', $fileName, 'local');

        return redirect()->route('import.map', [$importType]);
    }

    public function mapImport($importType)
    {
        $importer = ImportFactory::create($importType);

        return view('import.map')
            ->with('importType', $importType)
            ->with('importFields', $importer->getFields($importType))
            ->with('fileFields', $importer->getFileFields(storage_path($importType.'.csv')));
    }

    public function mapImportSubmit($importType)
    {
        $importer = ImportFactory::create($importType);

        if (! $importer->validateMap(request()->all())) {
            return redirect()->route('import.map', [$importType])
                ->withErrors($importer->errors())
                ->withInput();
        }

        if (! $importer->importData(request()->except('_token'))) {
            return redirect()->route('import.map', [$importType])
                ->withErrors($importer->errors());
        }

        return redirect()->route('import.index')
            ->with('alertInfo', trans('ip.records_imported_successfully'));
    }
}
