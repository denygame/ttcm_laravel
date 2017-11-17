<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    public function bill_detail()
    {
    	return $this->hasMany('App\Bill_Detail','bill_id','id');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer','id_customer','id');
    }
}
