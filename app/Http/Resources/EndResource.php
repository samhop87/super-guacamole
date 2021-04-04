<?php

namespace App\Http\Resources;

use App\Http\Models\Event;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class EventResource.
 */
class EndResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        // @todo: think about how to change this to log high scores
        return [
            'name'     => 'THE END',
            'type'     => 'game_over',
            'details'  => Event::whereIn('id', json_decode($request->pastEvents))->get()->map(function ($ind) {
                return $ind->name;
            })
        ];
    }
}
