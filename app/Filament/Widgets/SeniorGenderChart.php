<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class SeniorGenderChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected static ?string $heading = 'Age';
    protected static ?string $maxHeight = '250px';


    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Age',
                    'data' => [74, 65, 45, 77, 89],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                      ],
                ],
            ],
            'labels' => ['60-70', '71-80', '81-90', '91-100', '100+'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
