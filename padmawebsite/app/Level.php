<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    protected $fillable = [

        'name'

        ];

    public function timetable()
    {

        return $this->hasOne('App\Timetable');

    }
}
