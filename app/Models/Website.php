<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $fillable = [
        'website_name',
        'website_description',
        'website_price',
        'website_thumbnail',
        'website_preview',
        'demo_link',
        'tech_stack',
        'status',
        'category'
    ];
    
    protected $casts = [
        'website_preview' => 'array',
        'tech_stack' => 'array',
        'category' => 'array',
    ];
}
