<?php

namespace App\Filament\Resources\Articles\Pages;

use App\Filament\Resources\Articles\ArticleResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    public function getHeading(): string
    {
        return 'Edit Article';
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
            DeleteAction::make()
                ->successRedirectUrl(ArticleResource::getUrl('index')),
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
        $data['is_published'] = ($data['status'] ?? 'draft') === 'published';
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        }
        if (empty($data['content'])) {
            $data['content'] = $data['excerpt'] ?? '';
        }
        if (empty($data['user_id'])) {
            $data['user_id'] = auth()->id();
        }
        if (empty($data['category_id'])) {
            $data['category_id'] = \App\Models\Category::firstOrCreate(
                ['name' => 'General'],
                ['slug' => 'general']
            )->id;
        }
        $data['status'] = !empty($data['is_published']) ? 'published' : 'draft';
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
            'Edit',
        ];
    }
}

