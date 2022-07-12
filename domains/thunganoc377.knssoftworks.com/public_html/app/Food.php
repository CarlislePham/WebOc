<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $table="food";

        public function category()
    {
    	return $this->belongsTo('App\Category','id_cat','id');
    }

        public function bill_info()
    {
    	return $this->hasMany('App\BillInfo','id_food','id');
    }
}
