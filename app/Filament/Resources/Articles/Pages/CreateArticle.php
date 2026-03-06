<?php

namespace App\Filament\Resources\Articles\Pages;

use App\Filament\Resources\Articles\ArticleResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

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
        $data['slug']       = Str::slug($data['title']) . '-' . Str::random(6);
        $data['content']    = $data['excerpt'] ?? '';
        $data['user_id']    = auth()->id();
        $data['category_id'] = \App\Models\Category::firstOrCreate(
            ['name' => 'General'],
            ['slug' => 'general']
        )->id;
        $data['status']     = !empty($data['is_published']) ? 'published' : 'draft';
        unset($data['is_published']);
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
}

