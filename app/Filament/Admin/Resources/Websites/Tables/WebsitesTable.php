<?php

namespace App\Filament\Admin\Resources\Websites\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WebsitesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('website_name'),

                TextColumn::make('website_description'),

                TextColumn::make('website_price'),

                ImageColumn::make('website_thumbnail'),

                ImageColumn::make('website_preview'),

                TextColumn::make('demo_link'),

                TextColumn::make('tech_stack')
                    ->badge(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dijual' => 'success',
                        'tidak dijual' => 'danger'
                    }),

                TextColumn::make('category')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
