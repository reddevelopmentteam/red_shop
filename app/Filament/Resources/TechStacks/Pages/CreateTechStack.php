<?php

namespace App\Filament\Resources\TechStacks\Pages;

use App\Filament\Resources\TechStacks\TechStackResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateTechStack extends CreateRecord
{
    protected static string $resource = TechStackResource::class;

    #[Override]
    protected function getRedirectUrl(): string
    {
        return TechStackResource::getUrl('index');
    }
}
