<?php

namespace App\Filament\Resources\Units\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->extraAttributes(['class' => 'gf-unit-form-card'])
                    ->columns(2)
                    ->schema([
                        // ── Row 1: Unit Type | Size ─────────────────────
                        TextInput::make('unit_type_name')
                            ->label('Unit Type *')
                            ->placeholder('e.g., Type 01')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('size')
                            ->label('Size (SQM) *')
                            ->placeholder('e.g., 157')
                            ->numeric()
                            ->required()
                            ->minValue(0),

                        // ── Row 2: Bedrooms | Bathrooms ─────────────────
                        TextInput::make('bedrooms')
                            ->label('Bedrooms *')
                            ->placeholder('e.g., 2')
                            ->numeric()
                            ->required()
                            ->minValue(0),

                        TextInput::make('bathrooms')
                            ->label('Bathrooms *')
                            ->placeholder('e.g., 2')
                            ->numeric()
                            ->required()
                            ->minValue(0),

                        // ── Row 3: View Type ────────────────────────────
                        TextInput::make('location')
                            ->label('View Type *')
                            ->placeholder('e.g., Golf View')
                            ->required()
                            ->maxLength(100)
                            ->columnSpanFull(),

                        // ── Show on website (checkbox) ───────────────────
                        Checkbox::make('show_on_page')
                            ->label('Show on website')
                            ->default(true)
                            ->columnSpanFull(),
                    ]),

                Section::make('Unit Photos')
                    ->description('Upload up to 50 photos for this unit. First image is used as the cover photo.')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('gallery')
                            ->label('Gallery Photos')
                            ->collection('gallery')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->maxFiles(50)
                            ->maxSize(15360)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->columnSpanFull(),
                    ]),

                Section::make('Floor Plan')
                    ->description('Upload a single floor plan image.')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('floor_plan')
                            ->label('Floor Plan')
                            ->collection('floor_plan')
                            ->image()
                            ->maxSize(15360)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
