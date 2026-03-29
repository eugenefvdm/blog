<?php

namespace App\Filament\Resources\Posts;

use App\Enums\Status;
use App\Filament\Resources\Posts\Pages\CreatePost;
use App\Filament\Resources\Posts\Pages\EditPost;
use App\Filament\Resources\Posts\Pages\ListPosts;
use App\Filament\Resources\Posts\Pages\ViewPost;
use App\Models\Post;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
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

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Select::make('categoryId')
                    ->required()
                    ->default(1)
                    ->relationship('category', 'title')
                    ->createOptionForm([
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('description'),
                    ]),
                RichEditor::make('excerpt')
                    ->hint('Displayed on summaries and feeds')
                    ->required(),
                CharcountedTextarea::make('description')
                    ->label('Description')
                    ->rows(4)
                    ->hintIcon('heroicon-o-code-bracket')
                    ->hint('Meta description tag in header')
                    ->helperText('Used by Google search previews and should be ~155-160 characters.')
                    ->minCharacters(155)
                    ->maxCharacters(160)
                    ->maxLength(255),

                TiptapEditor::make('body')
                    ->extraInputAttributes(['style' => 'min-height: 12rem;'])
                    ->required(),

                SpatieMediaLibraryFileUpload::make('featured_image')
                    ->responsiveImages(),

                // Forms\Components\FileUpload::make('featured_image')
                //     ->storeFileNamesIn('attachment_file_names')
                //     ->disk('blog'),

                TextInput::make('featured_image_alt_tag')
                    ->required()
                    ->maxLength(255),

                Select::make('tagId')
                    ->multiple()
                    ->relationship('tags', 'title')
                    ->createOptionForm([
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('description'),
                    ]),

                Select::make('status')
                    ->options(Status::options())
                    ->default(Status::PUBLISHED),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')
                    ->disk('blog'),
                TextColumn::make('title')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('category.title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->sortable()
                    ->dateTime(),
            ])
            ->defaultSort('order_column')
            ->reorderable('order_column')

            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),

            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
                RestoreBulkAction::make(),
                ForceDeleteBulkAction::make(),
                ExportBulkAction::make(),
                BulkAction::make('updateStatus')
                    ->action(function (Collection $records, array $data): void {
                        foreach ($records as $record) {
                            $record->status = $data['status'];
                            $record->save();
                        }
                    })
                    ->form([
                        Select::make('status')
                            ->options(Status::options())
                            ->required(),
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPosts::route('/'),
            'create' => CreatePost::route('/create'),
            'view' => ViewPost::route('/{record}'),
            'edit' => EditPost::route('/{record}/edit'),
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
