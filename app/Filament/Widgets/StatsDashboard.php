<?php

namespace App\Filament\Widgets;

use App\Models\Carpool;
use App\Models\Mobil;
use App\Models\Motor;
use App\Models\Voucher;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDashboard extends BaseWidget
{
protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalMobil = Mobil::count();
        $totalMotor = Motor::count();
        $totalVoucher = Voucher::count();
        $toalCarPool = Carpool::count();

        return [
            Stat::make('Total Mobil', $totalMobil)
                ->description('Jumlah semua mobil')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([4, 2, 10, 4, 10, 6, 7])
                ->color('success'),

            Stat::make('Total Motor', $totalMotor)
                ->description('Jumlah semua motor')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([3, 5, 2, 8, 9, 7, 6])
                ->color('warning'),

            Stat::make('Total Voucher', $totalVoucher)
                ->description('Jumlah semua voucher')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([4, 9, 6, 5, 8, 10, 12])
                ->color('info'),
                Stat::make('Total CarPool', $toalCarPool)
                  ->description('Jumlah semua CarPool')
                  ->descriptionIcon('heroicon-m-arrow-trending-up')
                  ->chart([4, 9, 6, 5, 8, 10, 12])
                  ->color('danger')
            ];



    }
}
