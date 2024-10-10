<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class SeniorAgeChart extends ChartWidget
{
    protected static ?string $heading = 'Gender';
    protected static ?string $maxHeight = '240px';
    

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Senior Citizen Age Demographic',
                    'data' => [519 , 659],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                      ],
                      
                ],
            ],
            'labels' => ['Male', 'Female'],
            
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
