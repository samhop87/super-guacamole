<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'detail',
    ];

    CONST NATURAL_DISASTER  = "disaster";
    CONST POLITICAL_SMALL   = "small politics";
    CONST POLITICAL_SCANDAL = "scandal";
    CONST PERSONAL_SCANDAL  = "personal scandal";
    CONST POLITICAL_BIG     = "big politics";
    CONST CIVIL_UNREST      = "civil unrest";

    public function choices() {
        return $this->hasMany(Choice::class);
    }
}
