<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CateController extends Controller
{
    public static function getAlias($cate_id)
    {
    	$cate = Category::where('id',$cate_id)->firstOrFail();
    	return $cate->alias;
    }
}
