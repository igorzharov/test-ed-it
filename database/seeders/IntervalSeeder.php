<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntervalSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i <= 10000; $i++) {

            $start = fake()->numberBetween(1, 99999);

            $paste[] = [
                'start' => $start,
                'end' => $i % 3 === 0 ? null : fake()->numberBetween($start, 99999),
            ];
        }

        DB::table('intervals')->insert($paste);
    }
}
