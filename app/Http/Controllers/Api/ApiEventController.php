<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Choice;
use App\Models\Event;
use App\Models\Outcome;
use Illuminate\Support\Facades\DB;

class ApiEventController extends Controller
{
    public function index() {
        $stability  = request('stability');
        $popularity = request('popularity');
        $pastEvents = json_decode(request('pastEvents'));

        $severity = 1;

        // TODO: There's got to be a better way of doing this, too.
        switch ($stability) {
            case $stability < 20:
                $severity = 5;
                break;
            case $stability > 20 && $stability < 40:
                $severity = 4;
                break;
            case $stability > 40 && $stability < 60:
                $severity = 3;
                break;
            case $stability > 60 && $stability < 80:
                $severity = 2;
                break;
            case $stability > 80:
                $severity = 1;
                break;
            default:
                $severity = 1;
        }

        // TODO: FIX THIS - currently if no event returned, it breaks.
        // It should find the next event
        if (!empty($pastEvents)) {
            $event = Event::where('severity', $severity)
                ->whereNotIn('id', $pastEvents)
                ->first();
        } else {
            $event = Event::find(1);
        }

        // TODO: PLACEHOLDER!
        if (!$event) {
            $event = Event::find(1);
        }

        // Create a resource of the event, along with the choices (and outcomes?)
        return new EventResource($event);
    }

    public function store()
    {
        // TODO: MOVE THIS FUNCTION INTO THE ADMIN CONTROLLER
        $event = request();

        DB::transaction(function () use ($event) {
            $newEvent = Event::firstOrCreate([
                'name' => $event->name,
                'type' => $event->type,
                'detail' => $event->detail,
                'severity' => $event->severity
            ]);

            foreach ($event->decision as $key => $decision) {
                $choice = Choice::firstOrCreate([
                    'event_id' => $newEvent->id,
                    'choice_type' => $key
                ], [
                    'event_id' => $newEvent->id,
                    'choice_type' => $key,
                    'details' => $decision['choice']
                ]);

                Outcome::firstOrCreate([
                    'event_choice_id' => $choice->id,
                    'stability_effect' => $decision['outcome']['stability_effect'],
                    'popularity_effect' => $decision['outcome']['popularity_effect'],
                    'info' => $decision['outcome']['text']
                ]);
            }
        });

        return response()->json([
            'message' => 'Event has created successfully',
        ], 201);
    }
}
