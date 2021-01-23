<?php

namespace App\Console\Commands;

use App\Models\Event;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

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
        $eventAwaitingImage = Event::whereNull('image_url')->get();

        foreach($eventAwaitingImage as $event) {
            $client = new Client();
            $query = $event->keyword_for_image ? strtolower($event->keyword_for_image) : strtok(strtolower($event->name), " ");
            $url = "https://api.pexels.com/v1/search?query=" . $query;

            $params = [
                'per_page' => 1
            ];

            $headers = [
                'Authorization' => env('PEXELS_API_KEY')
            ];

            $response = $client->request('GET', $url, [
                'json' => $params,
                'headers' => $headers,
                'verify'  => false,
            ]);

            // TODO: Handle errors properly
            $responseBody = json_decode($response->getBody());

            $event->image_url = $responseBody && $responseBody->photos[0] ? $responseBody->photos[0]->src->original : null;
            $event->save();
        }
    }
}
