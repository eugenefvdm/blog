<?php

namespace App\Filament\Resources;

use App\Enums\Status;
use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use MartinRo\FilamentCharcountField\Components\CharcountedTextarea;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('categoryId')
                    ->required()
                    ->default(1)
                    ->relationship('category', 'title')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('title')
                            ->required(),
                        Forms\Components\TextInput::make('description'),
                    ]),
                Forms\Components\RichEditor::make('excerpt')
                    ->hint('Displayed on summaries and feeds')
                    ->required(),
                CharcountedTextarea::make('description')
                    ->label('Description')
                    ->rows(4)
                    ->hintIcon('heroicon-o-code')
                    ->hint('Meta description tag in header')
                    ->helperText('Used by Google search previews and should be ~155-160 characters.')
                    ->minCharacters(155)
                    ->maxCharacters(160)
                    ->maxLength(255),

                TiptapEditor::make('body')
                    ->extraInputAttributes(['style' => 'min-height: 12rem;'])
                    ->required(),

                Forms\Components\FileUpload::make('featured_image')
                    ->storeFileNamesIn('attachment_file_names')
                    ->disk('blog'),

                Forms\Components\TextInput::make('featured_image_alt_tag')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('tagId')
                    ->multiple()
                    ->relationship('tags', 'title')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('title')
                            ->required(),
                        Forms\Components\TextInput::make('description'),
                    ]),

                Forms\Components\Select::make('status')
                    ->options(Status::options())
                    ->default(Status::PUBLISHED),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->disk('blog'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('category.title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()
                    ->dateTime(),
            ])
            ->defaultSort('order_column')
            ->reorderable('order_column')

            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                ExportBulkAction::make(),
                Tables\Actions\BulkAction::make('updateStatus')
                    ->action(function (Collection $records, array $data): void {
                        foreach ($records as $record) {
                            $record->status = $data['status'];
                            $record->save();
                        }
                    })
                    ->form([
                        Forms\Components\Select::make('status')
                            ->options(Status::options())
                            ->required(),
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AuditsRelationManager::class,
        ];
    }
}
