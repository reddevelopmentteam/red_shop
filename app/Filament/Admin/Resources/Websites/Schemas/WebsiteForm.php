<?php

namespace App\Filament\Admin\Resources\Websites\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WebsiteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('website_name')
                    ->required(),

                TextInput::make('website_description')
                    ->required(),

                TextInput::make('website_price')
                    ->required(),

                FileUpload::make('website_thumbnail')
                    ->required()
                    ->image()
                    ->preserveFilenames(),

                FileUpload::make('website_preview')
                    ->required()
                    ->multiple()
                    ->image()
                    ->preserveFilenames(),

                TextInput::make('demo_link')
                    ->required(),

                TagsInput::make('tech_stack')
                    ->required(),

                Select::make('status')
                    ->required()
                    ->options([
                        'dijual' => 'Dijual',
                        'tidak dijual' => 'Tidak Dijual',
                    ]),

                Select::make('category')
                    ->required()
                    ->multiple()
                    ->options([
                        'portofolio' => 'Portofolio',
                        'landing page' => 'Landing Page',
                        'dashboard' => 'Dashboard',
                        'e-commerce' => 'E-Commerce',
                    ]),
            ]);
    }
}
