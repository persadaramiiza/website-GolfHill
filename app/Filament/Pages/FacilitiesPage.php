<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Facilities\FacilitiesResource;
use App\Models\Facility;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use BackedEnum;

class FacilitiesPage extends Page
{
    protected static string $routePath = '/facilities';

    protected string $view = 'filament.pages.facilities';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingStorefront;

    protected static ?string $navigationLabel = 'Facilities';

    protected static ?int $navigationSort = 3;

    public string $search = '';

    public string $filterType = '';

    public function getFacilities()
    {
        return Facility::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterType, function ($query) {
                $query->where('type', $this->filterType);
            })
            ->orderBy('id')
            ->get();
    }

    public function deleteFacility(int $id): void
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();
    }

    public function toggleVisibility(int $id): void
    {
        $facility = Facility::findOrFail($id);
        $facility->update(['show_on_page' => ! $facility->show_on_page]);
    }

    public function getCreateUrl(): string
    {
        return FacilitiesResource::getUrl('create');
    }

    public function getEditUrl(Facility $facility): string
    {
        return FacilitiesResource::getUrl('edit', ['record' => $facility]);
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
