<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Photo extends Model
{
    //

    protected $uploads = '/images/users/';

    protected $fillable = ['photo_path', 'user_id'];

    public function getFileAttribute($user_photo){


        return $this->uploads . $user_photo;


    }

    public function user(){

        $this->belongsTo('App\User');

    }


}
