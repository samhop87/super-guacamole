<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;

class ApiEventController extends Controller
{
    public function index() {
        $stability  = request('stability');
        $popularity = request('popularity');
        $pastEvents = json_decode(request('pastEvents'));

        $severity = Event::calculateSeverity($stability);

        if (!empty($pastEvents)) {
            $event = Event::where('severity', $severity)
                ->whereNotIn('id', $pastEvents)
                ->first();
        } else {
            $event = Event::whereNotNull('name')->first();
        }

        // Fallback
        if (!$event) {
            $event = Event::whereNotNull('name')->first();
        }

        return new EventResource($event);
    }
}
