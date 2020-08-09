<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaz extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'gaz';

    public function customers(){
    	return $this->belongsToMany('App\Customer', 'customer_gaz');
    }

    public function orders(){
    	return $this->hasMany('App\Order', 'gaz_id');
    }
}
