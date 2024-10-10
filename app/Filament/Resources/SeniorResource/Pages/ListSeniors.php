<?php

namespace App\Filament\Resources\SeniorResource\Pages;

use App\Filament\Resources\SeniorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeniors extends ListRecords
{
    protected static string $resource = SeniorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
