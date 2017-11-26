<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class AjaxAminController extends Controller
{
	public function showCate(Request $request)
	{
		$idcate=$request->idcate;
		$cate=Category::where('id',$idcate)->first();
		return $cate;
	}

	public function updateCate(Request $request)
	{
		$idcate=$request->idcate;
		$value=$request->value;
		Category::where('id',$idcate)->update(['name'=>$value]);
		return response()->json(['success'=>redirect()->route('profile')->with(['success-category'=>'Cập nhật dữ liệu thành công'])]);
	}

	public function insertCate(Request $request)
	{
		$value=$request->value;
		$cate=new Category;
		$cate->name=$value;
		$cate->alias=changeTitle($value);
		$cate->save();

		return response()->json(['success'=>redirect()->route('profile')->with(['success-category'=>'Thêm mới danh mục thành công'])]);

	}
}
