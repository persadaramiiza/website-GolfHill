<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Article')
                    ->extraAttributes(['class' => 'gf-unit-form-card gf-article-form-card'])
                    ->columns(12)
                    ->schema([
                        TextInput::make('title')
                            ->label('Article Title')
                            ->placeholder('Enter article title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label('Article Content')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'h2',
                                'h3',
                                'blockquote',
                                'bulletList',
                                'orderedList',
                                'undo',
                                'redo',
                            ]),

                        SpatieMediaLibraryFileUpload::make('featured_image')
                            ->label('Featured Images')
                            ->collection('featured_image')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->imageEditor()
                            ->maxFiles(10)
                            ->maxSize(25600)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->columnSpanFull(),

                        DatePicker::make('published_at')
                            ->label('Published Date')
                            ->required()
                            ->native(false)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}