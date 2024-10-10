<?php

namespace App\Filament\Widgets;

use App\Models\Senior;
use App\Models\Benefit;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
class SeniorAgeInfo extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('Registered Senior Citizen', Senior::count()),
            
            Stat::make('Benefit Types', Benefit::count()),
            Stat::make('Registered User', User::count()),
        ];
    }
}
