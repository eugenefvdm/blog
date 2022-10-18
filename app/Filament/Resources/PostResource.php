<?php

namespace App\Filament\Resources;

use App\Models\Tag;
use Filament\Forms;
use App\Models\Post;
use App\Models\User;
use Filament\Tables;
use App\Enums\Status;
use App\Models\Category;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->options(Category::all()->pluck('title', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\RichEditor::make('excerpt')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(160),
                Forms\Components\RichEditor::make('body')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\Select::make('tags')
                    ->multiple()
                    ->options(Tag::all()->pluck('title', 'title')),
                Forms\Components\Select::make('status')
                    ->options(Status::options())
                    ->default(Status::PUBLISHED),
                Forms\Components\FileUpload::make('featured_image')
                    ->disk('public')
                    ->directory('images'),                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\TextColumn::make('title')->wrap(),
                Tables\Columns\TextColumn::make('category.title'),                
                Tables\Columns\TextColumn::make('status'),                
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
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
                    ])
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CategoryRelationManager::class,
        ];
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

   

    
}
