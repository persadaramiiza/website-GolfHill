<?php

namespace App\Filament\Resources\Units\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // ── Section 1: Unit Information ─────────────────────────
                Section::make('Unit Information')
                    ->description('Set the unit name, type, and availability status.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Unit Name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, callable $set) =>
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->unique(ignoreRecord: true),
                        Select::make('unit_type_id')
                            ->label('Unit Type')
                            ->relationship('unitType', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'available' => 'Available',
                                'sold' => 'Sold',
                                'reserved' => 'Reserved',
                            ])
                            ->required()
                            ->default('available'),
                    ]),

                // ── Section 2: Specifications ───────────────────────────
                Section::make('Unit Specifications')
                    ->description('Enter floor area, room count, pricing, and location details.')
                    ->columns(3)
                    ->schema([
                        TextInput::make('size')
                            ->label('Size (m²)')
                            ->numeric()
                            ->suffix('m²')
                            ->minValue(0),
                        TextInput::make('bedrooms')
                            ->label('Bedrooms')
                            ->numeric()
                            ->minValue(0),
                        TextInput::make('bathrooms')
                            ->label('Bathrooms')
                            ->numeric()
                            ->minValue(0),
                        TextInput::make('price')
                            ->label('Price')
                            ->numeric()
                            ->prefix('Rp'),
                        TextInput::make('location')
                            ->label('View / Location')
                            ->maxLength(255),
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                // ── Section 3: Settings ─────────────────────────────────
                Section::make('Settings')
                    ->description('Assign a contact person and control public visibility.')
                    ->columns(2)
                    ->schema([
                        Select::make('contact_person_id')
                            ->label('Contact Person')
                            ->relationship('contactPerson', 'name')
                            ->searchable()
                            ->preload(),
                        Toggle::make('show_on_page')
                            ->label('Show on Public Page')
                            ->default(true)
                            ->onColor('success')
                            ->offColor('danger'),
                    ]),
            ]);
    }
}
