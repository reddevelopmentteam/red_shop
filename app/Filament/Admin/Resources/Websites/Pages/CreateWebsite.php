<?php

namespace App\Filament\Admin\Resources\Websites\Pages;

use App\Filament\Admin\Resources\Websites\WebsiteResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateWebsite extends CreateRecord
{
    protected static string $resource = WebsiteResource::class;
    #[Override]
    protected function getRedirectUrl(): string
    {
        return WebsiteResource::getUrl('index');
    }
}
