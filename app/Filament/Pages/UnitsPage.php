<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Units\UnitResource;
use App\Models\Unit;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use BackedEnum;

class UnitsPage extends Page
{
    protected static string $routePath = '/units';

    protected string $view = 'filament.pages.units';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $navigationLabel = 'Units';

    protected static ?int $navigationSort = 2;

    public string $search = '';

    public function getUnits()
    {
        return Unit::with(['media', 'unitType'])
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('location', 'like', '%' . $this->search . '%');
            })
            ->orderBy('id')
            ->get();
    }

    public function deleteUnit(int $id): void
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
    }

    public function toggleVisibility(int $id): void
    {
        $unit = Unit::findOrFail($id);
        $unit->update(['show_on_page' => ! $unit->show_on_page]);
    }

    public function getCreateUrl(): string
    {
        return UnitResource::getUrl('create');
    }

    public function getEditUrl(Unit $unit): string
    {
        return UnitResource::getUrl('edit', ['record' => $unit]);
    }
}
