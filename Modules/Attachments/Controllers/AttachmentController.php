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

namespace Modules\Attachments\Controllers;

use App\Events\CheckAttachment;
use App\Http\Controllers\Controller;
use Modules\Attachments\Models\Attachment;

class AttachmentController extends Controller
{
    public function download($urlKey)
    {
        $attachment = Attachment::where('url_key', $urlKey)->firstOrFail();

        return response()->download($attachment->attachable->attachment_path.'/'.$attachment->filename);
    }

    public function ajaxList()
    {
        $model = request('model');

        // Whitelist allowed models to prevent arbitrary class instantiation
        $allowedModels = [
            'Modules\Invoices\Models\Invoice',
            'Modules\Quotes\Models\Quote',
            'Modules\Expenses\Models\Expense',
        ];

        if (! in_array($model, $allowedModels)) {
            abort(403, 'Invalid model type');
        }

        $object = $model::find(request('model_id'));

        return view('attachments._table')
            ->with('model', request('model'))
            ->with('object', $object);
    }

    public function ajaxDelete()
    {
        Attachment::destroy(request('attachment_id'));
    }

    public function ajaxModal()
    {
        return view('attachments._modal_attach_files')
            ->with('model', request('model'))
            ->with('modelId', request('model_id'));
    }

    public function ajaxUpload()
    {
        $model = request('model');

        // Whitelist allowed models to prevent arbitrary class instantiation
        $allowedModels = [
            'Modules\Invoices\Models\Invoice',
            'Modules\Quotes\Models\Quote',
            'Modules\Expenses\Models\Expense',
        ];

        if (! in_array($model, $allowedModels)) {
            abort(403, 'Invalid model type');
        }

        $object = $model::find(request('model_id'));

        event(new CheckAttachment($object));
    }

    public function ajaxAccessUpdate()
    {
        $attachment = Attachment::find(request('attachment_id'));

        $attachment->client_visibility = request('client_visibility');

        $attachment->save();
    }
}
