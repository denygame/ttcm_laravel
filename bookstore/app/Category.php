<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "cates";

    public function book(){
    	return $this->hasMany('App\Book','cate_id','id');
    }
}
