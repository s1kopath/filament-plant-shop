<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ProductStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', Product::all()->count())
                ->description('Total number of products')
                ->color('success')
                ->icon('heroicon-o-document-text'),
            Stat::make('Active Products', Product::where('is_active', true)->count())
                ->description('Number of products that are currently active')
                ->color('success')
                ->icon('heroicon-o-check-circle'),
            Stat::make('Inactive Products', Product::where('is_active', false)->count())
                ->description('Number of products that are currently inactive')
                ->color('danger')
                ->icon('heroicon-o-x-circle'),
        ];
    }
}
