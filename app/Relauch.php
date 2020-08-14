<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relauch extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function order(){
    	return $this->belongsTo('App\Order', 'customer_gaz_id');
    }
}
