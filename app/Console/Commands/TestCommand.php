<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;

class testCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'local:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For running local tests';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $stability = mt_rand(1,100);

        $stability = 1;

        $score = Event::calculateSeverity($stability);

        dd($score);
    }
}
