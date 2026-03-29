<?php

namespace App\Filament\Resources\Users\Pages;

use Filament\Actions\EditAction;
use App\Filament\Resources\Users\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
