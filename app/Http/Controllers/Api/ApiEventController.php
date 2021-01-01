<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Models\Event;
use App\Models\Outcome;
use Illuminate\Http\Request;

class ApiEventController extends Controller
{
    public function index() {
        $event = request()->get('id');
        // Determine which event to return
        Event::where('id', $event->id)->with('outcomes')->first();
        // Pass in the data from the component -> stability & popularity for now, and number of months in charge.
        // Calculate event type?
        // Calculate which event of event type


        // Create a resource of the event, along with the choices (and outcomes?)
        return new EventResource($event);
    }

    public function store()
    {
        $event = request()->toArray();

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
                'details' => $decision->choice
            ]);

            Outcome::firstOrCreate([
                'event_choice_id' => $choice->id,
                'stability_effect' => $decision->outcome->stability_effect,
                'popularity_effect' => $decision->outcome->popularity_effect,
                'info' => $decision->outcome->text
            ]);
        }

        return response()->json([
            'message' => 'Event has created successfully',
        ], 201);
    }
}
