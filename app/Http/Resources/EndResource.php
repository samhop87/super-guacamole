<?php

namespace App\Http\Resources;

use App\Models\Event;
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
        dd(Event::whereIn('id', json_decode($request->pastEvents))->get()->toArray());
        return [
            'name'     => 'THE END',
            'type'     => 'game_over',
           'details'  => Event::whereIn('id', json_decode($request->pastEvents))->get()

//               $this->resource->choices->map(function ($choice) {
//                return new OutcomeResource($choice->outcome);
//            })
        ];
    }
}
