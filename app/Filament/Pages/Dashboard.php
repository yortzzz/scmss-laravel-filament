<?php
 
namespace App\Filament\Pages;
use App\Filament\Resources\SeniorResource\Widgets\SeniorAgesChart;
 
class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'Dashboard';
    public static function widgets(): array
{
    return [
        SeniorAgesChart::class,
    ];
}

    
   
}