<?php

namespace App\Events\Listeners;

use App\Events\QuoteRejected;
use Modules\MailQueue\Support\MailQueue;
use App\Support\Parser;

class QuoteRejectedListener
{
    public function __construct(MailQueue $mailQueue)
    {
        $this->mailQueue = $mailQueue;
    }

    public function handle(QuoteRejected $event)
    {
        $event->quote->activities()->create(['activity' => 'public.rejected']);

        $parser = new Parser($event->quote);

        $mail = $this->mailQueue->create($event->quote, [
            'to' => [$event->quote->user->email],
            'cc' => [config('ip.mail_default_cc')],
            'bcc' => [config('ip.mail_default_bcc')],
            'subject' => trans('ip.quote_status_change_notification'),
            'body' => $parser->parse('quoteRejectedEmailBody'),
            'attach_pdf' => config('ip.attach_pdf'),
        ]);

        $this->mailQueue->send($mail->id);
    }
}
