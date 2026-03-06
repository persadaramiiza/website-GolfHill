<?php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Pages\UnitsPage;
use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUnit extends EditRecord
{
    protected static string $resource = UnitResource::class;

    public function getHeading(): string
    {
        return 'Edit Unit';
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
            DeleteAction::make()
                ->successRedirectUrl(UnitsPage::getUrl()),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()
                ->label('Save Changes')
                ->icon('heroicon-o-document-check')
                ->extraAttributes(['class' => 'gf-save-btn']),
            $this->getCancelFormAction()
                ->label('Cancel')
                ->extraAttributes(['class' => 'gf-cancel-btn']),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $unitType = \App\Models\UnitType::find($data['unit_type_id'] ?? null);
        $data['unit_type_name'] = $unitType ? $unitType->name : '';
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $typeName = trim($data['unit_type_name'] ?? ($data['name'] ?? 'Unit'));
        $unitType = \App\Models\UnitType::firstOrCreate(
            ['name' => $typeName],
            ['slug' => \Illuminate\Support\Str::slug($typeName)]
        );
        $data['unit_type_id'] = $unitType->id;
        if (empty($data['name'])) {
            $data['name'] = $typeName;
        }
        if (empty($data['slug'])) {
            $data['slug'] = \Illuminate\Support\Str::slug($typeName) . '-' . \Illuminate\Support\Str::random(6);
        }
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
            'Edit',
        ];
    }
}
