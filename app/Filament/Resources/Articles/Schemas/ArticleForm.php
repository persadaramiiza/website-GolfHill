<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->extraAttributes(['class' => 'gf-unit-form-card'])
                    ->columns(2)
                    ->schema([
                        // ── Article Title (full-width) ───────────────────
                        TextInput::make('title')
                            ->label('Article Title *')
                            ->placeholder('Enter article title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        // ── Excerpt (full-width) ─────────────────────────
                        Textarea::make('excerpt')
                            ->label('Excerpt *')
                            ->placeholder('Brief description of the article')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                        // ── Row: Publication Date | Featured Image URL ───
                        DatePicker::make('published_at')
                            ->label('Publication Date *')
                            ->placeholder('e.g., February 2026')
                            ->required(),

                        TextInput::make('featured_image_url')
                            ->label('Featured Image URL *')
                            ->placeholder('https://...')
                            ->url()
                            ->required()
                            ->maxLength(2048),

                        // ── Publish checkbox (full-width) ────────────────
                        Checkbox::make('is_published')
                            ->label('Publish article (show on website)')
                            ->default(false)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
