<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentReply extends Model
{
    //

    protected $fillable = [

        'comment_id',
        'user_id',
        'body',
        'status',


    ];

    public function comment(){

        $this->belongsTo('App\Comment');

    }

    public function user(){

        return $this->belongsTo('App\User');

    }


}
