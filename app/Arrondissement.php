<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrondissement extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function city(){
    	return $this->belongsTo('App\City', 'cities_id');
    }

    public function quarters(){
    	return $this->hasMany('App\Quarter', 'arrondissements_id');
    }
}
