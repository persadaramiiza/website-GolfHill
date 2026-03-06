<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Facility Name')
                ->required()
                ->maxLength(255),

            Textarea::make('description')
                ->label('Short Description')
                ->rows(2)
                ->maxLength(500),

            Select::make('type')
                ->label('Type')
                ->options([
                    'indoor'  => 'Indoor',
                    'outdoor' => 'Outdoor',
                ])
                ->default('indoor')
                ->required(),

            Toggle::make('show_on_page')
                ->label('Show on Public Page')
                ->default(true),
        ]);
    }
}
