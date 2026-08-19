<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('category.name')
                    ->searchable()
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
                            ? "<iconify-icon icon='simple-icons:{$techStack->icon}' style='font-size: 1.25rem; margin-right: 0.35rem;' inline></iconify-icon>"
                            : '';

                        return new HtmlString("<span style='display: inline-flex; align-items: center; margin-right: 0.5rem;'>{$iconHtml}" . e($state) . "</span>");
                    })
                    ->html(),
                TextColumn::make('price')
                    ->prefix('Rp')
                    ->sortable(),
                TextColumn::make('discount_price')
                    ->sortable(),
                TextColumn::make('status')
                    ->sortable()
                    ->searchable()
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
                TextColumn::make('views'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No Products Yet')
            ->emptyStateDescription('Once you add the first product, it will appear here.')
            ->emptyStateIcon('heroicon-o-shopping-bag');
    }
}
