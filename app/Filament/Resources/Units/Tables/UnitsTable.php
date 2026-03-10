<?php

namespace App\Filament\Resources\Units\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UnitsTable
{
    public static function configure(Table $table): Table
    { 
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('unitType.name')
                    ->badge()
                    ->sortable(),
                TextColumn::make('price')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('size_range')
                    ->label('Size')
                    ->getStateUsing(function ($record) {
                        $min = $record->size_min;
                        $max = $record->size_max;
                        if ($min && $max && $min != $max) {
                            return number_format($min) . '\u2013' . number_format($max) . ' SQM';
                        }
                        $val = $min ?? $max ?? $record->size;
                        return $val ? number_format($val) . ' SQM' : '—';
                    })
                    ->sortable(false),
                TextColumn::make('bedrooms')
                    ->suffix(' BR'),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'available',
                        'danger' => 'sold',
                        'warning' => 'reserved',
                    ])
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('unit_type_id')
                    ->relationship('unitType', 'name')
                    ->label('Type'),
                SelectFilter::make('status')
                    ->options([
                        'available' => 'Available',
                        'sold' => 'Sold',
                        'reserved' => 'Reserved',
                    ]),
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
