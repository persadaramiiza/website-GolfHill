<?php

namespace App\Filament\Resources\Units\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => 
                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                    ),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Select::make('unit_type_id')
                    ->relationship('unitType', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'sold' => 'Sold',
                        'reserved' => 'Reserved',
                    ])
                    ->required()
                    ->default('available'),
                Textarea::make('description')
                    ->rows(4),
                TextInput::make('price')
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('size')
                    ->numeric()
                    ->suffix('m²'),
                TextInput::make('bedrooms')
                    ->numeric()
                    ->minValue(0),
                TextInput::make('bathrooms')
                    ->numeric()
                    ->minValue(0),
                TextInput::make('location')
                    ->maxLength(255),
                Select::make('contact_person_id')
                    ->relationship('contactPerson', 'name')
                    ->searchable()
                    ->preload(),
            ]);
    }
}
