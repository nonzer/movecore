<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected  $guarded = [];

    protected $table = 'category_customers';

    public function customers(){
    	return $this->hasMany('App\Customer', 'category_customers_id');
    }
}
