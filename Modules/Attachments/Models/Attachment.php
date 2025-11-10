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

namespace Modules\Attachments\Models;

use App\Events\AttachmentCreating;
use App\Events\AttachmentDeleted;
use App\Support\DateFormatter;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($attachment) {
            event(new AttachmentCreating($attachment));
        });

        static::deleted(function ($attachment) {
            event(new AttachmentDeleted($attachment));
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function attachable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('Modules\Users\Models\User');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getDownloadUrlAttribute()
    {
        return route('attachments.download', [$this->url_key]);
    }

    public function getFormattedCreatedAtAttribute()
    {
        return DateFormatter::format($this->created_at, true);
    }
}