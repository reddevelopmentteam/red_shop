<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Feature Information')
                ->columnSpanFull()
                ->maxWidth('full')
                ->schema([
                    TextInput::make('name')
                        ->required(),
                ]),
            ]);
    }
}
