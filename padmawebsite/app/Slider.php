<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //

    protected $fillable = [

      'post_id',
      'slider_photo'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
