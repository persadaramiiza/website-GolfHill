<?php

namespace App\Filament\Resources\ContactPeople\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactPersonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('whatsapp')
                    ->tel()
                    ->maxLength(255)
                    ->helperText('Format: 628xxxxxxxxxx'),
            ]);
    }
}
