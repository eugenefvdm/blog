<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Reworck\FilamentSettings\FilamentSettings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // FilamentSettings::setFormFields([
        //     \Filament\Forms\Components\TextInput::make('x'),
        //     \Filament\Forms\Components\TextInput::make('y'),
        //     \Filament\Forms\Components\Select::make('Blog Home Page Layout')
        //         ->options([
        //             'default',
        //             'grid',
        //         ]),
        // ]);

        JsonResource::withoutWrapping();
    }
}
