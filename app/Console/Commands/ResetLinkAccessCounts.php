<?php

namespace App\Console\Commands;

use App\Models\Link;
use Illuminate\Console\Command;

class ResetLinkAccessCounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:reset-access-counts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset access counts of all links';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Link::query()->update(['access_count' => 0]);
        $this->info('Access counts of all links have been reset.');
    }
}
