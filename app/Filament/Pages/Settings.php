<?php

namespace App\Filament\Pages;

use App\Settings\BlogSettings;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\TextInput;

class Settings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = BlogSettings::class;

    protected static ?int $navigationSort = 20;

    protected static ?string $navigationGroup = 'System';

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('site_name')
                ->label('Blog Name')
                ->required(),            
        ];
    }
}
