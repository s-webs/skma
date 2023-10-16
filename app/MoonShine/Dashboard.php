<?php

namespace App\MoonShine;

use App\Models\Honor;
use App\Models\News;
use App\Models\Slider;
use MoonShine\Dashboard\DashboardBlock;
use MoonShine\Dashboard\DashboardScreen;
use MoonShine\Metrics\DonutChartMetric;

class Dashboard extends DashboardScreen
{
    public function blocks(): array
    {
        return [
            DashboardBlock::make([
                DonutChartMetric::make('Материалов')
                    ->columnSpan(6)
                    ->values([
                        'Новости' => News::query()->count(),
                        'Слайдеры' => Slider::query()->count(),
                        'Достижения' => Honor::query()->count(),
                    ]),
            ]),

        ];
    }
}
