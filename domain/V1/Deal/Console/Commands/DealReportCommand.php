<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Console\Commands;

use Illuminate\Console\Command;

final class DealReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:Deal-usage-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        return self::SUCCESS;
    }
}
