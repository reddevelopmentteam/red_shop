<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Feature extends Model
{
    protected $fillable = [
        'name'
    ];

    public function products():BelongsToMany 
    {
        return $this->belongsToMany(Product::class, 'features_product', 'feature_id', 'product_id');
    }
}
