<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //


    protected $fillable = [

        'title',
        'body',
        'status',
        'slug',
        'user_id',

    ];



    public function photos(){

        return $this->hasMany('App\Photo');

    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function categories(){

        return $this->belongsToMany('App\Category');

    }

    public function comments(){


        return $this->hasMany('App\Comment');
        
    }

    public function slider()
    {

        return $this->hasOne('App\Slider');

    }


}
