<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relauch extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function order(){
    	return belongsTo('App\Order');
    }
}
