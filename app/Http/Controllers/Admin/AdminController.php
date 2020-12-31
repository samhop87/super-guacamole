<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $event = request()->get('id');
        // Determine which event to return
        Event::where('id', $event->id)->with('outcomes')->first();
        // Pass in the data from the component -> stability & popularity for now, and number of months in charge.
        // Calculate event type?
        // Calculate which event of event type


        // Create a resource of the event, along with the choices (and outcomes?)
        return new EventResource($event);
    }
}
