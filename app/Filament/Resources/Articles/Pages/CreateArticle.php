<?php

namespace App\Filament\Resources\Articles\Pages;

use App\Filament\Resources\Articles\ArticleResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Filament\Support\Enums\Width;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;
    protected Width|string|null $maxContentWidth = Width::Full;

    public function getHeading(): string
    {
        return 'Add New Article';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Back to Articles')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(ArticleResource::getUrl('index'))
                ->extraAttributes(['class' => 'gf-back-btn']),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Publish Article')
                ->icon('heroicon-o-document-check')
                ->extraAttributes(['class' => 'gf-save-btn']),
            $this->getCancelFormAction()
                ->label('Cancel')
                ->extraAttributes(['class' => 'gf-cancel-btn']),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        $data['excerpt'] = Str::limit(strip_tags($data['content']), 180);
        $data['user_id'] = auth()->id();
        $data['category_id'] = \App\Models\Category::firstOrCreate(
            ['name' => 'General'],
            ['slug' => 'general']
        )->id;
        $data['status'] = filled($data['published_at']) ? 'published' : 'draft';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return ArticleResource::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            ArticleResource::getUrl('index') => 'Articles',
            'Add New Article',
        ];
    }

    public function getExtraBodyAttributes(): array
    {
        return [
            'class' => 'gf-article-form-page',
        ];
    }
}

