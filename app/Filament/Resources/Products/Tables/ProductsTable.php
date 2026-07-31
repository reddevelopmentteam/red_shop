<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge(),

                TextColumn::make('slug'),

                TextColumn::make('techStacks.name') // Tambahkan .name agar Filament mengambil per item
                    ->label('Tech Stack')
                    ->formatStateUsing(function ($state, $record, $component) {
                        // Filament akan meloop setiap tech stack satu per satu.
                        // Kita cari model TechStack terkait berdasarkan nama
                        $techStack = $record->techStacks->firstWhere('name', $state);
                        
                        $iconHtml = ($techStack && $techStack->icon)
                            ? "<i class='si si-{$techStack->icon}' style='font-size: 1.2rem; margin-right: 0.35rem;'></i>"
                            : '';

                        return new HtmlString("<span style='display: inline-flex; align-items: center; margin-right: 0.5rem;'>{$iconHtml}" . e($state) . "</span>");
                    })
                    ->html(),

                TextColumn::make('price')
                ->prefix('Rp'),

                TextColumn::make('discount_price'),

                TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'for sale' => 'success',
                    'not for sale' => 'danger'
                }),

                ImageColumn::make('thumbnail'),

                ImageColumn::make('img'),

                TextColumn::make('about'),

                TextColumn::make('license'),

                TextColumn::make('version'),

                TextColumn::make('demo_link'),

                TextColumn::make('views')
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
