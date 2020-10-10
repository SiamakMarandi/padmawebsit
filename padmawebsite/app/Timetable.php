<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timetable extends Model
{
    //
    protected $fillable = [

        'saturday_from',
        'saturday_to',
        'sunday_from',
        'sunday_to',
        'monday_from',
        'monday_to',
        'tuesday_from',
        'tuesday_to',
        'thursday_from',
        'thursday_to',
        'wednesday_from',
        'wednesday_to',
        'friday_from',
        'friday_to',
        'description',
        'sport_id',
        'teacher_id',
        'level_id',
    ];

    public function sport()
    {

        return $this->belongsTo('App\Sport');

    }

    public function teacher()
    {

        return $this->belongsTo('App\Teacher');

    }

    public function level(){


        return $this->belongsTo('App\Level');

    }

}
