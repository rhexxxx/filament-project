<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Jurusan;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Siswa', Siswa::count())
                ->description('Jumlah siswa yang ada')
                ->descriptionIcon('heroicon-o-user')
                ->color('primary'),
            Stat::make('Total Guru', Guru::count())
                ->description('Jumlah Guru yang ada')
                ->descriptionIcon('heroicon-o-user')
                ->color('alert'),
            Stat::make('Total Kelas', Kelas::count())
                ->description('Jumlah Kelas yang ada')
                ->descriptionIcon('heroicon-o-beaker')
                ->color('success'),

            Stat::make('Total Jurusan', Jurusan::count())
                ->description('Jumlah Jurusan yang ada')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('danger'),
        ];
    }
}
