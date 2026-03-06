<?php

namespace App\Filament\Resources\ContactPeople;

use App\Filament\Resources\ContactPeople\Pages\CreateContactPerson;
use App\Filament\Resources\ContactPeople\Pages\EditContactPerson;
use App\Filament\Resources\ContactPeople\Pages\ListContactPeople;
use App\Filament\Resources\ContactPeople\Schemas\ContactPersonForm;
use App\Filament\Resources\ContactPeople\Tables\ContactPeopleTable;
use App\Models\ContactPerson;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ContactPersonResource extends Resource
{
    protected static ?string $model = ContactPerson::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ContactPersonForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactPeopleTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContactPeople::route('/'),
            'create' => CreateContactPerson::route('/create'),
            'edit' => EditContactPerson::route('/{record}/edit'),
        ];
    }
}
