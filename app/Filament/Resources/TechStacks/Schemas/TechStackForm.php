<?php

namespace App\Filament\Resources\TechStacks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TechStackForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Teck Stack Information')
                ->columnSpanFull()
                ->maxWidth('full')
                ->schema([
                    TextInput::make('name')
                        ->required(),

                    TextInput::make('icon')
                        ->required()
                        ->placeholder('Contoh: javascript'),
                ]),
            ]);
    }
}
