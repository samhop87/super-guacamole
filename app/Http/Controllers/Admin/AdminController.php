<?php

namespace App\Http\Controllers;

use App\Models\Event;

class AdminController extends Controller
{
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
