<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\dashboardWidget;
use Filament\Pages\Page;
use BackedEnum;

class Dashboard extends Page
{
    protected string $view = 'filament.pages.dashboard';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home';

    protected static string|BackedEnum|null $activeNavigationIcon = "heroicon-s-home";

    protected function getHeaderWidgets(): array
    {
        return [];
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }
}
