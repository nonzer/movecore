<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function quarter(){
    	return belongsTo('App\Quarter', 'quaters_id');
    }

    public function category(){
    	return belongsTo('App\Category', 'category_customers_id');
    }

    public function gaz(){
    	return belongsToMany('App\Gaz');
    }

    public function orders(){
    	return hasMany('App\Order', 'customer_id');
    }
}
