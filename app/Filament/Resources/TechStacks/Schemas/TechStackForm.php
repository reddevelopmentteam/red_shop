<?php

namespace App\Filament\Resources\TechStacks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TechStackForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                TextInput::make('icon')
                    ->required()
                    ->placeholder('Contoh: javscript'),
            ]);
    }
}
