<?php

namespace App\Filament\Widgets;

use App\Models\Carpool;
use App\Models\Mitra;
use App\Models\Mobil;
use App\Models\Motor;
use App\Models\Voucher;
use App\Models\Emergency; // tambahkan ini
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
        $totalCarpool = Carpool::count();
        $totalMitra = Mitra::count();
        $totalEmergency = Emergency::count(); // hitung total emergency

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

            Stat::make('Total Carpool', $totalCarpool)
                ->description('Jumlah semua carpool')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([4, 9, 6, 5, 8, 10, 12])
                ->color('success'),

            Stat::make('Total Mitra', $totalMitra)
                ->description('Jumlah semua mitra terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->chart([4, 6, 8, 7, 10, 6, 15])
                ->color('warning'),

            Stat::make('Total Emergency', $totalEmergency) // tambah ini
                ->description('Jumlah semua laporan emergency')
                ->descriptionIcon('heroicon-m-bell-alert')
                ->chart([5, 3, 8, 6, 10, 7, 12])
                ->color('info'),
        ];
    }
}
