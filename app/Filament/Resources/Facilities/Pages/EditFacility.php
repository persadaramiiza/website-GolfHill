<?php

namespace App\Filament\Resources\Facilities\Pages;

use App\Filament\Pages\FacilitiesPage;
use App\Filament\Resources\Facilities\FacilitiesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFacility extends EditRecord
{
    protected static string $resource = FacilitiesResource::class;

    protected function getRedirectUrl(): string
    {
        return FacilitiesPage::getUrl();
    }

    public function getBreadcrumbs(): array
    {
        return [
            FacilitiesPage::getUrl() => 'Facilities',
            'Edit',
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->successRedirectUrl(FacilitiesPage::getUrl()),
        ];
    }
}
