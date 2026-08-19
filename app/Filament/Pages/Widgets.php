<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Widgets extends Page
{
    protected string $view = 'filament.pages.widgets';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
