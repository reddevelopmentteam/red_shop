<?php

namespace App\Filament\Resources\Features\Pages;

use App\Filament\Resources\Features\FeatureResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateFeature extends CreateRecord
{
    protected static string $resource = FeatureResource::class;

    #[Override]
        protected function getRedirectUrl(): string
    {
        return FeatureResource::getUrl('index');
    }
}
