<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* Relationships */

    public function trips() {
        return $this->belongsToMany('App\Trip');
    }

    public function tripsAdmin() {
        return $this->hasMany('App\Trip');
    }

    public function groups() {
        return $this->belongsToMany('App\Group');
    }

    public function groupsAdmin() {
        return $this->hasMany('App\Group');
    }

    public function interests() {
        return $this->belongsToMany('App\Interest');
    }

    public function achievements() {
        return $this->belongsToMany('App\Achievement');
    }
    public function message() {
        return $this->belongsToMany('App\Message');
    }
    
    public function User(){
        return $this->belongsToMany('User', 'User', 'user1_id', 'user2_id');
    }

    public function topics() {
        return $this->hasMany('App\Topic');
    }

    public function topicMessages() {
        return $this->hasMany('App\TopicMessage');
    }
   
    // public function activityLogs() {
    //     return $this->hasMany('App\ActivityLog');
    // }
}
