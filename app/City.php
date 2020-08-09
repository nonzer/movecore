<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function country(){
    	return $this->belongsTo('App\Country', 'countries_id');
    }

    public function arrondissements(){
    	return $this->hasMany('App\Arrondissement', 'cities_id');
    }
}
