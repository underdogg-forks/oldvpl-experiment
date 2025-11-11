<?php

namespace App\Events\Listeners;

use App\Events\QuoteApproved;
use Modules\MailQueue\Support\MailQueue;
use Modules\Quotes\Support\QuoteToInvoice;
use App\Support\DateFormatter;
use App\Support\Parser;

class QuoteApprovedListener
{
    public function __construct(MailQueue $mailQueue, QuoteToInvoice $quoteToInvoice)
    {
        $this->mailQueue = $mailQueue;
        $this->quoteToInvoice = $quoteToInvoice;
    }

    public function handle(QuoteApproved $event)
    {
        // Create the activity record
        $event->quote->activities()->create(['activity' => 'public.approved']);

        // If applicable, convert the quote to an invoice when quote is approved
        if (config('ip.convert_quote_when_approved')) {
            $this->quoteToInvoice->convert(
                $event->quote,
                date('Y-m-d'),
                DateFormatter::incrementDateByDays(date('Y-m-d'), config('ip.invoices_due_after')),
                config('ip.invoice_group')
            );
        }

        $parser = new Parser($event->quote);

        $mail = $this->mailQueue->create($event->quote, [
            'to' => [$event->quote->user->email],
            'cc' => [config('ip.mail_default_cc')],
            'bcc' => [config('ip.mail_default_bcc')],
            'subject' => trans('ip.quote_status_change_notification'),
            'body' => $parser->parse('quoteApprovedEmailBody'),
            'attach_pdf' => config('ip.attach_pdf'),
        ]);

        $this->mailQueue->send($mail->id);
    }
}
