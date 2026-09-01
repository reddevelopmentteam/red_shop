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
                    ->columnSpanFull()
                    ->maxWidth('full')
                    ->columns(2)
                    ->schema([
                        Select::make('categories')
                            ->label('Category')
                            ->required()
                            ->relationship('category', 'name')
                            ->searchable()
                            ->multiple()
                            ->preload()
                            ->columnSpan(1),

                        TextInput::make('name')
                            ->label('Product name')
                            ->required()
                            ->maxLength(255)
                            ->afterStateUpdated(fn (string $operation, $state, $set) => 
                                 $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                )
                        ->columnSpan(1),
                        TextInput::make('slug')
                            ->unique()
                            ->columnSpan(1),

                        TextInput::make('price')
                            ->label('Price')
                            ->numeric()
                            ->prefix('Rp')
                            ->required()
                            ->columnSpan(1),

                        TextInput::make('discount_price')
                        ->prefix('Rp')
                        ->numeric()
                        ->columnSpan(1),
                        
                        Select::make('status')
                        ->required()
                        ->options([
                            'for sale' => 'For Sale',
                            'not for sale' => 'Not For Sale'
                            ]),
                        
                        FileUpload::make('thumbnail')
                        ->required()
                        ->image()
                            ->disk('public')
                        ->columnSpan(1),

                        FileUpload::make('img')
                        ->required()
                        ->multiple()
                        ->image()
                            ->disk('public')
                        ->columnSpan(1),

                        TextInput::make('about')
                        ->required()
                        ->columnSpanFull(),

                        Select::make('license')
                        ->required()
                        ->options([
                            'personal' => 'Personal',
                            'commercial' => 'Commercial',
                            'personal & commercial' => 'Personal & Commercial'
                        ])
                        ->columnSpan(1),

                        TextInput::make('version')
                        ->required()
                        ->columnSpan(1),

                        TextInput::make('demo_link')
                        ->columnSpan(1),

                        Select::make('features')
                            ->required()
                            ->relationship('features', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->columnSpan(1),
                        
                        Select::make('tech_stacks')
                            ->required()
                            ->relationship('techStacks', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->label('Tech Stack')
                            ->columnSpan(1),
                     ]),
            ]);
    }
}
