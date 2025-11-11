<?php

namespace App\Events\Listeners;

use App\Events\InvoiceCreatedRecurring;
use App\Events\InvoiceEmailed;
use Modules\MailQueue\Support\MailQueue;
use App\Support\Parser;

class InvoiceCreatedRecurringListener
{
    public function __construct(MailQueue $mailQueue)
    {
        $this->mailQueue = $mailQueue;
    }

    public function handle(InvoiceCreatedRecurring $event)
    {
        if (config('ip.automatic_email_on_recur') and $event->invoice->client->email) {
            $parser = new Parser($event->invoice);

            if (!$event->invoice->is_overdue) {
                $subject = $parser->parse('invoiceEmailSubject');
                $body = $parser->parse('invoiceEmailBody');
            } else {
                $subject = $parser->parse('overdueInvoiceEmailSubject');
                $body = $parser->parse('overdueInvoiceEmailBody');
            }

            $mail = $this->mailQueue->create($event->invoice, [
                'to' => [$event->invoice->client->email],
                'cc' => [config('ip.mail_default_cc')],
                'bcc' => [config('ip.mail_default_bcc')],
                'subject' => $subject,
                'body' => $body,
                'attach_pdf' => config('ip.attach_pdf'),
            ]);

            $this->mailQueue->send($mail->id);

            event(new InvoiceEmailed($event->invoice));
        }
    }
}
