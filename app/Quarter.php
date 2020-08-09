<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    public $timestamps = false;
    
    protected $guarded = [];

    protected $table = "quaters";

    public function arrondissement(){
    	return $this->belongsTo('App\Arrondissement', 'arrondissements_id');
    }

    public function customers(){
    	return $this->hasMany('App\Customer', 'quaters_id');
    }
}
