<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";

    public function category()
    {
    	return $this->belongsTo('App\Category','cate_id','id');
    }

    public function bill_detail()
    {
    	return $this->hasMany('App\Bill_Detail','book_id','id');
    }
}
