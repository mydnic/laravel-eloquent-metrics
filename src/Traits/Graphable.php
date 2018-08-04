<?php

namespace Mydnic\Metrics\Traits;

use Carbon\Carbon;

trait Graphable
{
    public static function countByDay(Carbon $from = null, Carbon $to = null)
    {
        return self::countByPeriod('Y-m-d', $from ?? now()->subDays(29), $to ?? now());
    }

    public static function countByMonth(Carbon $from = null, Carbon $to = null)
    {
        return self::countByPeriod('Y-m', $from ?? now()->subMonths(11), $to ?? now());
    }

    public static function countByYear()
    {
        return self::countByPeriod('Y');
    }

    public static function countByPeriod($periodFormat, $from, $to)
    {
        return self::select('created_at')
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<', $to)
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($value) use ($periodFormat) {
                return Carbon::parse($value->created_at)->format($periodFormat);
            })
            ->map(function ($item) {
                return count($item);
            });
    }

    public static function growthByDay()
    {
        // code...
    }

    public static function growthByMonth()
    {
        // code...
    }

    public static function growthByYear()
    {
        // code...
    }
}
