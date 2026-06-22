<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Unit;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $urls = collect([
            [
                'loc' => URL::to('/'),
                'lastmod' => now(),
                'changefreq' => 'weekly',
                'priority' => '1.0',
            ],
            [
                'loc' => route('units.index'),
                'lastmod' => $this->latestUpdatedAt(Unit::class),
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ],
            [
                'loc' => route('facilities.index'),
                'lastmod' => now(),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('pondok-indah-apartment'),
                'lastmod' => now(),
                'changefreq' => 'monthly',
                'priority' => '0.9',
            ],
            [
                'loc' => route('articles.index'),
                'lastmod' => $this->latestUpdatedAt(Article::class),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('about'),
                'lastmod' => now(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
            [
                'loc' => route('contact'),
                'lastmod' => now(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
        ]);

        $unitUrls = Unit::query()
            ->select(['slug', 'updated_at'])
            ->latest('updated_at')
            ->get()
            ->map(fn (Unit $unit): array => [
                'loc' => route('units.show', $unit->slug),
                'lastmod' => $unit->updated_at,
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ]);

        $articleUrls = Article::query()
            ->select(['slug', 'updated_at', 'published_at'])
            ->where('status', 'published')
            ->latest('published_at')
            ->get()
            ->map(fn (Article $article): array => [
                'loc' => route('articles.show', $article->slug),
                'lastmod' => $article->updated_at ?? $article->published_at,
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ]);

        $xml = view('sitemap', [
            'urls' => $urls->merge($unitUrls)->merge($articleUrls),
        ])->render();

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    private function latestUpdatedAt(string $modelClass): Carbon
    {
        $updatedAt = $modelClass::query()->max('updated_at');

        return $updatedAt ? Carbon::parse($updatedAt) : now();
    }
}
