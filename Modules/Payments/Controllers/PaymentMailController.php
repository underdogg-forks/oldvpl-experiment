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

namespace Modules\Payments\Controllers;

use App\Http\Controllers\Controller;
use Modules\MailQueue\Support\MailQueue;
use Modules\Payments\Models\Payment;
use App\Requests\SendEmailRequest;
use App\Support\Contacts;
use App\Support\Parser;

class PaymentMailController extends Controller
{
    private $mailQueue;

    public function __construct(MailQueue $mailQueue)
    {
        $this->mailQueue = $mailQueue;
    }

    public function create()
    {
        $payment = Payment::find(request('payment_id'));

        $contacts = new Contacts($payment->invoice->client);

        $parser = new Parser($payment);

        return view('payments._modal_mail')
            ->with('paymentId', $payment->id)
            ->with('redirectTo', request('redirectTo'))
            ->with('subject', $parser->parse('paymentReceiptEmailSubject'))
            ->with('body', $parser->parse('paymentReceiptBody'))
            ->with('contactDropdownTo', $contacts->contactDropdownTo())
            ->with('contactDropdownCc', $contacts->contactDropdownCc())
            ->with('contactDropdownBcc', $contacts->contactDropdownBcc());
    }

    public function store(SendEmailRequest $request)
    {
        $payment = Payment::find($request->input('payment_id'));

        $mail = $this->mailQueue->create($payment, $request->except('payment_id'));

        if (!$this->mailQueue->send($mail->id)) {
            return response()->json(['errors' => [[$this->mailQueue->getError()]]], 400);
        }
    }
}