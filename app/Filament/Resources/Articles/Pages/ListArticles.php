<?php

namespace App\Filament\Resources\Articles\Pages;

use App\Filament\Resources\Articles\ArticleResource;
use Filament\Resources\Pages\ListRecords;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;

    protected string $view = 'filament.resources.articles.list-articles';

    // Disable semua default Filament wrappers
    public function hasLogo(): bool
    {
        return false;
    }

    public function hasTopbar(): bool  
    {
        return false;
    }
}