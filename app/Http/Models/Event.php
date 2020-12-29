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

    CONST NATURAL_DISASTER  = "disaster";
    CONST POLITICAL_SMALL   = "small politics";
    CONST POLITICAL_SCANDAL = "scandal";
    CONST PERSONAL_SCANDAL  = "personal scandal";
    CONST POLITICAL_BIG     = "big politics";
    CONST CIVIL_UNREST      = "civil unrest";

    public function outcomes() {
        return $this->hasMany(Outcome::class);
    }
}
