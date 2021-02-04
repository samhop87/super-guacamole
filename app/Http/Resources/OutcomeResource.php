<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class EventResource.
 */
class OutcomeResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'event_choice_id' => $this->event_choice_id,
            'health_effect'   => $this->health_effect,
            'luck_effect'     => $this->luck_effect,
            'info'            => $this->info,
        ];
    }
}
