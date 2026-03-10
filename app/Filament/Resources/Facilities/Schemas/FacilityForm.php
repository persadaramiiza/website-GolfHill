<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Facility Information')
                ->description('Please fill in the details about the available facilities')
                ->schema([
                    TextInput::make('name')
                        ->label('Facility Name')
                        ->required()
                        ->maxLength(255),

                    Select::make('type')
                        ->label('Type')
                        ->options([
                            'indoor'  => 'Indoor',
                            'outdoor' => 'Outdoor',
                        ])
                        ->default('indoor')
                        ->required(),

                    Textarea::make('description')
                        ->label('Short Description')
                        ->rows(3)
                        ->maxLength(500),

                    Toggle::make('show_on_page')
                        ->label('Show on Public Page')
                        ->helperText('Enable to display this facility on the front-end catalog.')
                        ->default(true),
                ]),

            Section::make('Facility Photo')
                ->description('Upload a photo to represent this facility on the website')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('photo')
                        ->label('Photo')
                        ->collection('photo')
                        ->image()
                        ->imageEditor()
                        ->imageResizeMode('cover')
                        ->imageResizeTargetWidth(1920)
                        ->imageResizeTargetHeight(1080)
                        ->maxSize(25600)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                        ->columnSpanFull(),
                ]),
        ])->columns(2);
    }
}
