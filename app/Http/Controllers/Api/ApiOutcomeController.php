<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Choice;
use App\Models\Event;
use App\Models\Outcome;
use Illuminate\Support\Facades\DB;

class ApiOutcomeController extends Controller
{
    public function index() {
        // TODO: Calculate the success of a choice and return one of two outcomes - pos / neg.
        // Currently there is only one outcome to each choice.
        // Calculate outcome
    }
}
