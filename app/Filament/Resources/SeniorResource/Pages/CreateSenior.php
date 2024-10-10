<?php

namespace App\Filament\Resources\SeniorResource\Pages;

use App\Filament\Resources\SeniorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSenior extends CreateRecord
{
    protected static string $resource = SeniorResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
