<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Product Information')
                    ->schema([
                        Select::make('category_id')
                            ->required()
                            ->relationship('category', 'name') // Menghubungkan ke relasi Model Category
                            ->searchable()
                            ->preload(),

                        TextInput::make('name')
                            ->label('Product name')
                            ->required()
                            ->maxLength(255)
                            ->afterStateUpdated(fn (string $operation, $state, $set) => 
                                 $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                ),
                        
                        TextInput::make('slug')
                            ->unique(),

                        TextInput::make('price')
                            ->label('Price')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),

                        TextInput::make('discount_price')
                        ->prefix('Rp')
                        ->numeric(),
                
                        
                        Select::make('status')
                        ->required()
                        ->options([
                            'for sale' => 'For Sale',
                            'not for sale' => 'Not For Sale'
                            ]),
                        
                        FileUpload::make('thumbnail')
                        ->required()
                        ->image(),

                        FileUpload::make('img')
                        ->required()
                        ->multiple()
                        ->image(),

                        TextInput::make('about')
                        ->required(),

                        Select::make('license')
                        ->required()
                        ->options([
                            'personal' => 'Personal',
                            'commercial' => 'Commercial',
                            'personal & commercial' => 'Personal & Commercial'
                        ]),

                        TextInput::make('version')
                        ->required(),

                        TextInput::make('demo_link'),

                        Select::make('features')
                            ->required()
                            ->relationship('features', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable(),
                        
                        Select::make('tech_stacks')
                            ->required()
                            ->relationship('techStacks', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->label('Tech Stack'),
                     ]),
            ]);
    }
}
