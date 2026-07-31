<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'discount_price',
        'status',
        'thumbnail',
        'img',
        'about',
        'license',
        'version',
        'demo_link',
        'views',
    ];

    protected $casts = [
        'img' => 'array', // Mengubah kolom JSON secara otomatis menjadi Array/Object
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'views' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'features_product', 'product_id', 'feature_id');
    }

    public function techStacks(): BelongsToMany
    {
        return $this->belongsToMany(TechStack::class, 'products_tech_stack', 'product_id', 'tech_stack_id')
                    ->withTimestamps();
    }
}
