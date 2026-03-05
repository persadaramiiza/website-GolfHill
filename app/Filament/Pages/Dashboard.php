<?php

namespace App\Filament\Pages;

use App\Models\Article;
use App\Models\Unit;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static string $routePath = '/';

    protected string $view = 'filament.pages.dashboard';

    public int $totalArticles = 0;
    public int $totalUnits = 0;
    public int $totalFacilities = 9;
    public int $activeListings = 0;

    public function mount(): void
    {
        $this->totalArticles = Article::count();
        $this->totalUnits = Unit::count();
        $this->activeListings = Unit::count();
    }
}
