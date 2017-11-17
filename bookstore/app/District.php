<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "districts";

    public function ward(){
    	return $this->hasMany('App\Ward','district_id','id');
    }

    public function city()
    {
    	return $this->belongsTo('App\City','city_id','id');
    }
}
