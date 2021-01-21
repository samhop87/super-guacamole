<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AttachEventImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:retrieve-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes api call to get stock photo for event';

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
//       $imageCall = Http::withHeaders([
//            'accept' => 'application/json'
//        ])
//            ->withToken(env('PEXELS_API_KEY'))
//            ->get('https://api.pexels.com/v1')
//            ->json();
//
//       dd($imageCall);
    }
}
