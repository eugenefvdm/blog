<?php

namespace App\Filament\Pages;

use App\Settings\BlogSettings;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
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

            Fieldset::make('Contact Page')
                ->schema([
                    TextInput::make('contact_email'),

                    Checkbox::make('show_contact_email'),

                    TextInput::make('contact_number'),
                ]),

            Fieldset::make('Layouts, image uploading, footer, RSS')
                ->schema([
                    Select::make('home_page_layout')
                        ->options([
                            'default' => 'Default',
                            'grid' => 'Grid',
                        ])->required(),

                    TextInput::make('square_image_size')
                        ->helperText('Used by Grid layout'),

                    TextInput::make('rectangle_image_x_size')
                        ->helperText('Used by Default layout'),

                    TextInput::make('rectangle_image_y_size')
                        ->helperText('Used by Default layout'),

                    RichEditor::make('small_footer'),

                    Checkbox::make('enable_breadcrumbs')
                        ->label('Enable Breadcrumbs'),

                    Checkbox::make('enable_rss')
                        ->label('Enable RSS'),
                ]),

            Fieldset::make('Analytics & Social Settings')
                ->schema([
                    TextInput::make('google_analytics_tag'),

                    TextInput::make('twitter_username')
                        ->helperText('e.g. @username'),
                ]),

        ];
    }
}
