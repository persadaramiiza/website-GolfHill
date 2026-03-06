<?php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Pages\UnitsPage;
use App\Filament\Resources\Units\UnitResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUnit extends CreateRecord
{
    protected static string $resource = UnitResource::class;

    public function getHeading(): string
    {
        return 'Add New Unit';
    }

    public function getSubheading(): ?string
    {
        return 'Fill in the details below to add a new unit listing.';
    }

    protected function getRedirectUrl(): string
    {
        return UnitsPage::getUrl();
    }

    public function getBreadcrumbs(): array
    {
        return [
            UnitsPage::getUrl() => 'Units',
            'Add New Unit',
        ];
    }
}
