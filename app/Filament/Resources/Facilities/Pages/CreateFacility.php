<?php

namespace App\Filament\Resources\Facilities\Pages;

use App\Filament\Pages\FacilitiesPage;
use App\Filament\Resources\Facilities\FacilitiesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFacility extends CreateRecord
{
    protected static string $resource = FacilitiesResource::class;

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Create')
                ->extraAttributes(['class' => 'gf-save-btn']),
            $this->getCancelFormAction()
                ->label('Cancel')
                ->extraAttributes(['class' => 'gf-cancel-btn']),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return FacilitiesPage::getUrl();
    }

    public function getBreadcrumbs(): array
    {
        return [
            FacilitiesPage::getUrl() => 'Facilities',
            'Create',
        ];
    }
}
