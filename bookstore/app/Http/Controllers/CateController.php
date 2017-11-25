<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CateController extends Controller
{
    public static function getAlias($cate_id)
    {
    	$cate = Category::where('id',$cate_id)->first();
    	return $cate->alias;
    }

    public static function getName($cate_id)
    {
    	$cate = Category::where('id',$cate_id)->first();
    	return $cate->name;
    }
}
