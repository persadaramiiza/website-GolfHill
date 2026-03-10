<?php

namespace App\Filament\Pages;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Facility;
use App\Models\Unit;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static string $routePath = '/';

    protected string $view = 'filament.pages.dashboard';

    public int $totalArticles   = 0;
    public int $totalUnits      = 0;
    public int $totalFacilities = 0;
    public int $activeListings  = 0;
    public int $pendingComments = 0;
    public array $recentActivity = [];

    public function mount(): void
    {
        $this->totalArticles   = Article::count();
        $this->totalUnits      = Unit::count();
        $this->totalFacilities = Facility::count();
        $this->activeListings  = Unit::where('status', 'available')->count();
        $this->pendingComments = Comment::where('status', 'pending')->count();

        $articles = Article::latest('updated_at')->take(3)->get()->map(fn($a) => [
            'type'  => 'article',
            'label' => "Article \"{$a->title}\" updated",
            'time'  => $a->updated_at,
            'url'   => "/admin/articles/{$a->id}/edit",
        ]);

        $units = Unit::latest('updated_at')->take(3)->get()->map(fn($u) => [
            'type'  => 'unit',
            'label' => "Unit \"{$u->name}\" details modified",
            'time'  => $u->updated_at,
            'url'   => "/admin/units/{$u->id}/edit",
        ]);

        $facilities = Facility::latest('updated_at')->take(3)->get()->map(fn($f) => [
            'type'  => 'facility',
            'label' => "Facility \"{$f->name}\" information updated",
            'time'  => $f->updated_at,
            'url'   => "/admin/facilities/{$f->id}/edit",
        ]);

        $this->recentActivity = $articles->concat($units)->concat($facilities)
            ->sortByDesc('time')
            ->take(5)
            ->values()
            ->toArray();
    }
}
