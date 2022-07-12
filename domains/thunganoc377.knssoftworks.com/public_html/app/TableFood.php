<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableFood extends Model
{
    //
    protected $fillable = [
        'status',
    ];

    protected $table="tablefood";


    public function bill()
    {
    	return $this->hasMany('App\Bill','id_table','id');
    }
}
