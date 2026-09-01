<?php

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Computed;

new class extends Component
{
    /** @var array<int, array{name: string, category: string, price: string, originalPrice: ?string, discount: ?int, status: string, thumbnail: string}> */
    #[Computed]
    public function newestTemplates(): array
    {
        return Product::query()
            ->with('category')
            ->latest()
            ->take(8)
            ->get()
            ->map(fn (Product $product): array => $this->formatProduct($product))
            ->all();
    }

    #[Computed]
    public function bestSellingTemplates(): array
    {
        return Product::query()
            ->with('category')
            ->orderByDesc('views')
            ->take(8)
            ->get()
            ->map(fn (Product $product): array => $this->formatProduct($product))
            ->all();
    }

    private function formatProduct(Product $product): array
    {
            $hasDiscount = $product->discount_price !== null && $product->price > 0;
            $thumbnail = $product->thumbnail;
            $thumbnailPath = ltrim($thumbnail, '/');

            if (str_starts_with($thumbnailPath, 'storage/')) {
                $thumbnailPath = substr($thumbnailPath, 8);
            }

        return [
            'name' => $product->name,
            'category' => $product->category->first()?->name ?? 'Tanpa kategori',
            'price' => 'Rp'.number_format($product->discount_price ?? $product->price, 0, ',', '.'),
            'originalPrice' => $hasDiscount
                ? 'Rp'.number_format($product->price, 0, ',', '.')
                : null,
            'discount' => $hasDiscount
                ? (int) round((1 - $product->discount_price / $product->price) * 100)
                : null,
                'status' => $product->status === 'for sale' ? 'for sale' : 'not for sale',
                'thumbnail' => filter_var($thumbnail, FILTER_VALIDATE_URL)
                    ? $thumbnail
                    : asset('storage/'.$thumbnailPath),
                'demoLink' => $product->demo_link,
        ];
    }
};
