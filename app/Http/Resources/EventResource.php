<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class EventResource.
 */
class EventResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'       => $this->id,
            'name'     => $this->name,
        ];
    }
}
