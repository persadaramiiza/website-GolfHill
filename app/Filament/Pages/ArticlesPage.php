<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Articles\ArticleResource;
use App\Filament\Resources\Articles\Tables\ArticlesTable;
use App\Models\Article;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ArticlesPage extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $routePath = '/articles';

    protected string $view = 'filament.pages.articles';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static ?string $navigationLabel = 'Articles';

    protected static ?int $navigationSort = 1;

    public function table(Table $table): Table
    {
        return ArticlesTable::configure(
            $table->query(Article::query())
        );
    }

    public function getCreateUrl(): string
    {
        return ArticleResource::getUrl('create');
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
