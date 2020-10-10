<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role_id', 'user_photo_id', 'email', 'phone_no', 'password', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {

        return $this->belongsTo('App\Role');

    }

    public function user_photo()
    {


        return $this->hasOne('App\User_Photo');
    }


    public function isAdmin()
    {

        if ($this->role->name == 'Administrator') {

            return true;

        } else
            return false;

    }

    public function posts()
    {

        return $this->hasMany('App\Post');

    }


    public function non_photo()
    {

        return '/images/users/placeholder.jpg';
    }

    /*public function setPasswordAttribute($password){


            if(!empty($password)){


                $this->attributes['password'] = bcrypt($password);
            }

    }*/

    public function comments()
    {

        return $this->hasMany('App\Comment');

    }

    public function replies()
    {

        return $this->hasMany('App\commentReply');

    }


}
