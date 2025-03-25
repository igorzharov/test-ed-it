<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

final class IntervalService
{
    public function getIntervalByRange(int $start, ?int $end): Collection
    {
        return Cache::remember("intervals:start=$start&end=$end", 3600, function () use ($start, $end) {

            $query = DB::table('intervals')->where('start', '>=', $start);

            $query->when(
                is_null($end),
                function ($query) use ($end) {

                    $query->whereNull('end');
                },
                function ($query) use ($end) {

                    $query->where('end', '<=', $end);
                }
            );

            $query->orderBy('start');
            $query->limit(15);

            return $query->get();
        });

    }
}
