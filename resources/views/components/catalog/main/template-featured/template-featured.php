<?php

use App\Models\Product;
use Livewire\Component;

new class extends Component
{
    public function featuredTemplates(): array
    {
        return Product::query()
            ->with('category')
            ->latest()
            ->take(4)
            ->get()
            ->map(fn (Product $product): array => [
                'name' => $product->name,
                'category' => $product->category->first()?->name ?? 'Tanpa kategori',
                'price' => $product->discount_price !== null
                    ? 'Rp'.number_format((float) $product->discount_price, 0, ',', '.')
                    : 'Rp'.number_format((float) $product->price, 0, ',', '.'),
                'originalPrice' => $product->discount_price !== null && (float) $product->price > 0
                    ? 'Rp'.number_format((float) $product->price, 0, ',', '.')
                    : null,
                'discount' => $product->discount_price !== null && (float) $product->price > 0
                    ? (int) round((1 - ((float) $product->discount_price / (float) $product->price)) * 100)
                    : null,
                'status' => $product->status === 'for sale' ? 'tersedia' : 'tidak_tersedia',
                'thumbnail' => filter_var($product->thumbnail ?? '', FILTER_VALIDATE_URL)
                    ? $product->thumbnail
                    : asset('storage/'.ltrim(($product->thumbnail ?? ''), '/')),
            ])
            ->all();
    }
};
