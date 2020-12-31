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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function choice() {
        return $this->belongsTo(Choice::class);
    }
}
