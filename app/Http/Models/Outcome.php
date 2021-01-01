<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'outcomes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_choice_id', 'stability_effect', 'popularity_effect', 'info'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function choice() {
        return $this->belongsTo(Choice::class);
    }
}
