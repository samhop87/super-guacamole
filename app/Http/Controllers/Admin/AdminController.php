<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Event;
use App\Models\Outcome;
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

    /**
     * @return array
     */
    public function getEvents()
    {
        $eventTypes = [
            Event::NATURAL_DISASTER,
            Event::CIVIL_UNREST,
            Event::PERSONAL_SCANDAL,
            Event::POLITICAL_BIG,
            Event::POLITICAL_SMALL,
            Event::POLITICAL_SCANDAL
        ];

        return $eventTypes;
    }
}
