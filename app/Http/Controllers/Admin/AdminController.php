<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Choice;
use App\Http\Models\Event;
use App\Http\Models\Outcome;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $event = request();

        DB::transaction(function () use ($event) {
            $newEvent = Event::firstOrCreate([
                'name'              => $event->name,
                'keyword_for_image' => $event->keyword_for_image,
                'type'              => $event->type,
                'detail'            => $event->detail,
                'severity'          => $event->severity
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
                    'health_effect' => $decision['outcome']['health_effect'],
                    'luck_effect' => $decision['outcome']['luck_effect'],
                    'info' => $decision['outcome']['text']
                ]);
            }
        });

        return response()->json([
            'message' => 'Event has created successfully',
        ], 201);
    }

    /**
     * @return array
     */
    public function getEvents()
    {
        // Reformatting the event types to be stages.
        // @todo: make this change part of the game flow, rather than the returned events
        $eventStages = [
            Event::FIRST_STEPS,
            Event::EXPLORING,
            Event::LEARNING,
            Event::FIGHTING_FOR_SURVIVAL,
            Event::GETTING_STRONGER,
            Event::CONTINUING_TO_SURVIVE
        ];

        return $eventStages;
    }
}
