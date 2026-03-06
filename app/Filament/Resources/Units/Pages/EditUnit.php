<?php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Pages\UnitsPage;
use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUnit extends EditRecord
{
    protected static string $resource = UnitResource::class;

    public function getHeading(): string
    {
        return 'Edit Unit';
    }

    public function getSubheading(): ?string
    {
        return 'Update the unit details below.';
    }

    protected function getRedirectUrl(): string
    {
        return UnitsPage::getUrl();
    }

    public function getBreadcrumbs(): array
    {
        return [
            UnitsPage::getUrl() => 'Units',
            'Edit',
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->successRedirectUrl(UnitsPage::getUrl()),
        ];
    }
}
