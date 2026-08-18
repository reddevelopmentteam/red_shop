<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Categories\CategoriesResource;
use App\Filament\Resources\Contacts\ContactsResource;
use App\Filament\Resources\Products\ProductResource;
use App\Filament\Resources\TechStacks\TechStackResource;
use App\Filament\Resources\Features\FeatureResource;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Product;
use App\Models\TechStack;
use Filament\Widgets\Widget;

class dashboardWidget extends Widget
{
    protected static ?int $sort = -2;

    protected int | string | array $columnSpan = 'full';

    protected string $view = 'filament.widgets.dashboard-widget';

    protected function getViewData(): array
    {
        return [
            'name' => auth()->user()?->name ?? 'Admin',
            'memberCount' => Feature::query()->count(),
            'skillCount' => TechStack::query()->count(),
            'projectCount' => Product::query()->count(),
            'contactCount' => Contact::query()->count(),
            'latestProject' => Category::query()->latest()->value('name'),
            'quickLinks' => [
                [
                    'label' => 'Tambah Product',
                    'description' => 'Publikasikan Website Anda',
                    'url' => ProductResource::getUrl('create'),
                    'tone' => 'primary',
                ],
                [
                    'label' => 'fitur website',
                    'description' => 'Tunjukkan Fitur Website anda',
                    'url' => FeatureResource::getUrl('index'),
                    'tone' => 'dark',
                ],
                [
                    'label' => 'Atur teknologi',
                    'description' => 'Teknologi Website Anda',
                    'url' => TechStackResource::getUrl('index'),
                    'tone' => 'light',
                ],
                [
                    'label' => 'Kontak',
                    'description' => 'Periksa kanal komunikasi',
                    'url' => CategoriesResource::getUrl('index'),
                    'tone' => 'light',
                ],
            ],
        ];
    }
}