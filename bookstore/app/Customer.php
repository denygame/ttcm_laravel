<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public function bill($value='')
    {
    	return $this->hasMany('App\Customer','id_customer','id');
    }
}
