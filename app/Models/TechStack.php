<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class TechStack extends Model
{
    protected $table = 'tech_stacks';

    protected $fillable = [
        'name',
        'icon'
    ];

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'products_tech_stack', 'tech_stack_id', 'product_id')
                    ->withTimestamps();
    }
}
