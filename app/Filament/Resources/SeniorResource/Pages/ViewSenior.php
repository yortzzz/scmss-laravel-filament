<?php

namespace App\Filament\Resources\SeniorResource\Pages;

use App\Filament\Resources\SeniorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSenior extends ViewRecord
{
    protected static string $resource = SeniorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
