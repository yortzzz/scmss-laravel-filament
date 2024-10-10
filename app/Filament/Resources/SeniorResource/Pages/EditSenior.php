<?php

namespace App\Filament\Resources\SeniorResource\Pages;

use App\Filament\Resources\SeniorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSenior extends EditRecord
{
    protected static string $resource = SeniorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
