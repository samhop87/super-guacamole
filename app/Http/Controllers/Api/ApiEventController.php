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
        // Determine which event to return
        // Pass in the data from the component -> stability & popularity for now, and number of months in charge.
        // Calculate event type?
        // Calculate which event of event type
        $params = request();

        mt_rand();

        $event = Event::find(1);
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
                'detail' => $event->detail
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
