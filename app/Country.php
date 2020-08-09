<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function cities(){
    	return hasMany('App\City', 'countries_id');
    }
}
