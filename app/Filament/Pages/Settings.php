<?php

namespace App\Filament\Pages;

use App\Settings\BlogSettings;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class Settings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = BlogSettings::class;

    protected static ?int $navigationSort = 20;

    protected static ?string $navigationGroup = 'System';

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('title')
                ->label('Blog title')
                ->required(),

            TextInput::make('subtitle')
                ->label('Blog subtitle')
                ->required(),

            TextInput::make('google_analytics_tag'),

            TextInput::make('twitter_username'),

            Checkbox::make('enable_breadcrumbs')
            ->label('Enable Breadcrumbs'),

            Checkbox::make('enable_rss')
            ->label('Enable RSS'),

            RichEditor::make('small_footer'),
        ];
    }
}
