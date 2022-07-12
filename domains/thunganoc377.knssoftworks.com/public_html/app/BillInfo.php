<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillInfo extends Model
{
    //
    protected $table="bill_info";

    public function food()
    {
    	return $this->belongsTo('App\Food','id_food','id');
    }



    public function bill()
    {
    	return $this->belongsTo('App\Bill','id_bill','id');
    }
}
