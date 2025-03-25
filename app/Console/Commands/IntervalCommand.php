<?php

namespace App\Console\Commands;

use App\Services\IntervalService;
use Illuminate\Console\Command;
use Webmozart\Assert\InvalidArgumentException;

class IntervalCommand extends Command
{
    protected $signature = 'intervals:list {--left=} {--right=}';

    protected $description = 'Поиск интервалов по диапазону';

    public function __construct(
        private readonly IntervalService $service
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        $left = $this->option('left');
        $right = $this->option('right');

        try {

            $this->validate($left, $right);

        } catch (InvalidArgumentException $exception) {

            $this->error($exception->getMessage());

            return;
        }

        $intervalList = $this->service->getIntervalByRange($left, $right);

        if ($intervalList->isEmpty()) {

            $this->warn('Warning: Intervals not found!');

            return;
        }

        $intervalList = $intervalList->map(function ($interval) {
            return [
                'start' => $interval->start,
                'end' => $interval->end,
            ];
        });

        $this->table(
            ['start', 'end'],
            $intervalList->toArray()
        );
    }

    private function validate(?int $left, ?int $right): void
    {
        if (is_null($left)) {

            throw new InvalidArgumentException('Error: The left option are required! Example: php artisan intervals:list --left=1');
        }

        if (! is_null($right) && $right < $left) {

            throw new InvalidArgumentException('Error: The right option must be less than the left option! Example: php artisan intervals:list --left=10 --right=20');
        }
    }
}
