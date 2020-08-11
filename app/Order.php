<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'customer_gaz';

//    protected $primaryKey = ['customer_id', 'gaz_id'];

    public function customer(){
    	return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function gaz(){
    	return $this->belongsTo('App\Gaz', 'gaz_id');
    }

    public function delivery_man(){
    	return $this->belongsTo('App\User', 'personals_id');
    }

    public function relauch(){
    	return $this->hasOne('App\Relauch');
    }
}
