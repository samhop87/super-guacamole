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

        // This needs to work differently.
        // If the event is not found, then move to the next level of severity.
        // If still not found, move up a level of severity.
        // If still not found, return any event.
        // If nothing found, return game ended screen.

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
