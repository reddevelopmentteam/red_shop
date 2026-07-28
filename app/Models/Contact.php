<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'whatsapp_link',
        'tiktok_link',
        'instagram_link',
        'email_link',
    ];
}
