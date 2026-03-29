<?php

namespace App\Filament\Resources\Tags\Pages;

use Filament\Actions\EditAction;
use App\Filament\Resources\Tags\TagResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTag extends ViewRecord
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
