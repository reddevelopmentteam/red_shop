<?php

namespace App\Filament\Resources\TechStacks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class TechStacksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('icon')
                ->formatStateUsing(fn (?string $state): HtmlString =>
                    new HtmlString($state ? "<iconify-icon icon='simple-icons:{$state}' style='font-size: 1.25rem; margin-right: 0.35rem;' inline></iconify-icon>"
                : '')
                )
                ->alignCenter(),

                TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
