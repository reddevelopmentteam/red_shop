<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoriesResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateCategories extends CreateRecord
{
    protected static string $resource = CategoriesResource::class;

    #[Override]
     protected function getRedirectUrl(): string
    {
        return CategoriesResource::getUrl('index');
    }
}
