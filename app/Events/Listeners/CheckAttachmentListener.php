<?php

namespace App\Events\Listeners;

use App\Events\CheckAttachment;

class CheckAttachmentListener
{
    public function handle(CheckAttachment $event)
    {
        if (request()->hasFile('attachments')) {
            foreach (request()->file('attachments') as $attachment) {
                if ($attachment && $attachment->isValid()) {
                    // Sanitize filename to prevent directory traversal
                    $originalFilename = $attachment->getClientOriginalName();
                    $safeFilename = basename($originalFilename);
                    $safeFilename = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $safeFilename);

                    // Validate file type - only allow common document types
                    $allowedMimeTypes = [
                        'application/pdf',
                        'image/jpeg',
                        'image/png',
                        'image/gif',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'text/plain',
                        'text/csv',
                    ];

                    $mimeType = $attachment->getMimeType();

                    if (! in_array($mimeType, $allowedMimeTypes)) {
                        continue; // Skip files with disallowed mime types
                    }

                    // Validate file size (max 10MB)
                    if ($attachment->getSize() > 10485760) {
                        continue; // Skip files larger than 10MB
                    }

                    $event->object->attachments()->create([
                        'user_id' => auth()->user()->id,
                        'filename' => $safeFilename,
                        'mimetype' => $mimeType,
                        'size' => $attachment->getSize(),
                    ]);

                    $attachment->move($event->object->attachment_path, $safeFilename);
                }
            }
        }
    }
}
