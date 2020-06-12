<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Trip extends Model
{
    // use Searchable;

    protected $fillable = ['name','group_id','description','photo','departure','return_date','admin','visibility','foreseen_budget'];

    public function user() {
        return $this->belongsToMany('App\User');
    }

    public function admin() {
        return $this->belongsTo('App\User', 'admin');
    }

    public function interest() {
        return $this->belongsToMany('App\Interest');
    }

    public function group() {
        return $this->belongsTo('App\Group', 'group_id');
    }
}
