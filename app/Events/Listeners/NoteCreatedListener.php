<?php

namespace App\Events\Listeners;

use App\Events\NoteCreated;
use Modules\MailQueue\Support\MailQueue;

class NoteCreatedListener
{
    public function __construct(MailQueue $mailQueue)
    {
        $this->mailQueue = $mailQueue;
    }

    public function handle(NoteCreated $event)
    {
        $mail = $this->mailQueue->create($event->note->notable, [
            'to' => [$event->note->notable->user->email],
            'cc' => [config('ip.mail_default_cc')],
            'bcc' => [config('ip.mail_default_bcc')],
            'subject' => trans('ip.note_notification'),
            'body' => $event->note->formatted_note,
            'attach_pdf' => config('ip.attach_pdf'),
        ]);

        $this->mailQueue->send($mail->id);
    }
}
