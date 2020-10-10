<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function teachers()
    {

        return $this->belongsToMany('App\Teacher');

    }

    public function timetable()
    {

        return $this->hasOne('App\Timetable');

    }

}
