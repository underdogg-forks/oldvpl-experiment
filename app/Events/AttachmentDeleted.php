<?php

namespace App\Events;

use Modules\Attachments\Models\Attachment;
use Illuminate\Queue\SerializesModels;

class AttachmentDeleted extends Event
{
    use SerializesModels;

    public function __construct(Attachment $attachment)
    {
        $this->attachment = $attachment;
    }
}
