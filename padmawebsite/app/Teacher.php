<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = ['name', 'id_number', 'phone_number', 'email', 'address', 'status'];

    public function sports()
    {

        return $this->belongsToMany('App\Sport');

    }

    public function timetable()
    {

        return $this->hasOne('App\Timetable');

    }

}

