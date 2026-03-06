<?php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Pages\UnitsPage;
use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateUnit extends CreateRecord
{
    protected static string $resource = UnitResource::class;

    public function getHeading(): string
    {
        return 'Add New Unit';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Back to Units')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(UnitsPage::getUrl())
                ->extraAttributes(['class' => 'gf-back-btn']),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Create Unit')
                ->icon('heroicon-o-document-check')
                ->extraAttributes(['class' => 'gf-save-btn']),
            $this->getCancelFormAction()
                ->label('Cancel')
                ->extraAttributes(['class' => 'gf-cancel-btn']),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $typeName = trim($data['unit_type_name'] ?? 'Unit');
        $unitType = \App\Models\UnitType::firstOrCreate(
            ['name' => $typeName],
            ['slug' => \Illuminate\Support\Str::slug($typeName)]
        );
        $data['unit_type_id'] = $unitType->id;
        $data['name']         = $typeName;
        $data['slug']         = \Illuminate\Support\Str::slug($typeName) . '-' . \Illuminate\Support\Str::random(6);
        unset($data['unit_type_name']);
        return $data;
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
