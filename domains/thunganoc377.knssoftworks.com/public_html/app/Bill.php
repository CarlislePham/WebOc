<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table="bill";



    public function bill_info()
    {
    	return $this->hasMany('App\BillInfo','id_bill','id');
    }


    public function table()
    {
    	return $this->belongsTo('App\TableFood','id_table','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','bill_maker','id');
    }

}
