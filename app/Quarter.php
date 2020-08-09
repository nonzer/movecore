<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    public $timestamps = false;
    
    protected $guarded = [];

    protected $table = "quaters";

    public function arrondissement(){
    	return belongsTo('App\Arrondissement', 'arrondissements_id');
    }

    public function customers(){
    	return hasMany('App\Customer', 'quaters_id');
    }
}
