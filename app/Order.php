<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'customer_gaz';

    protected $primaryKey = ['customer_id', 'gaz_id'];

    public function customer(){
    	return belongsTo('App\Customer', 'customer_id');
    }

    public function gaz(){
    	return belongsTo('App\Gaz', 'gaz_id');
    }

    public function delivery_man(){
    	return belongsTo('App\User', 'personals_id');
    }

    public function relauch(){
    	return hasOne('App\Relauch');
    }
}
