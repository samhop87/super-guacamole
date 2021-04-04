<?php

namespace App\Http\Models;

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
        'name', 'type', 'detail', 'severity'
    ];

    CONST FIRST_STEPS           = "first steps";
    CONST EXPLORING             = "exploring";
    CONST LEARNING              = "learning";
    CONST FIGHTING_FOR_SURVIVAL = "fighting for survival";
    CONST GETTING_STRONGER      = "getting stronger";
    CONST CONTINUING_TO_SURVIVE = "continuing to survive";

    // Severity measured - 1 is most severe, 5 is least.

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function choices() {
        return $this->hasMany(Choice::class);
    }

    /**
     * @param $luck
     * @return int
     */
    public static function calculateSeverity($luck) {
        return (int) ceil($luck / 20);
    }
}
