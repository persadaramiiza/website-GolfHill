<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class Login extends BaseLogin
{
    protected string $view = 'filament.pages.auth.login';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('email')
                ->label('Email Address')
                ->placeholder('Enter email address')
                ->prefixIcon('heroicon-m-user')
                ->email()
                ->required()
                ->autocomplete()
                ->autofocus(),

            TextInput::make('password')
                ->label('Password')
                ->placeholder('Enter password')
                ->prefixIcon('heroicon-m-lock-closed')
                ->password()
                ->required()
                ->autocomplete('current-password'),
        ]);
    }
}
