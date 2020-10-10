<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //

    protected $fillable = [

        'post_id',
        'user_id',
        'body',
        'status',


    ];

    public function replies()
    {


        return $this->hasMany('App\commentReply');

    }

    public function post(){

        return $this->belongsTo('App\Post');

    }
    public function user(){

        return $this->belongsTo('App\User');

    }

}
