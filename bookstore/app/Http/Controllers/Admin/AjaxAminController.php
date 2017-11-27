<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Book;

class AjaxAminController extends Controller
{
	public function showCate(Request $request)
	{
		$idcate=$request->idcate;
		$cate=Category::where('id',$idcate)->first();
		return $cate;
	}

	public function showCateDeleteConfirm(Request $request)
	{
		$idcate=$request->idcate;
		$countBookInCate=Book::where('stt_delete',0)->where('cate_id',$idcate)->count();
		return $countBookInCate;
	}

	public function updateCate(Request $request)
	{
		$idcate=$request->idcate;
		$value=$request->value;
		Category::where('id',$idcate)->update(['name'=>$value]);
		return response()->json(['success'=>redirect()->route('managecate')->with(['success-category'=>'Cập nhật dữ liệu thành công'])]);
	}

	public function insertCate(Request $request)
	{
		$value=$request->value;
		$cate=new Category;
		$cate->name=$value;
		$cate->alias=changeTitle($value);
		$cate->save();

		return response()->json(['success'=>redirect()->route('managecate')->with(['success-category'=>'Thêm mới danh mục thành công'])]);
	}

	public function deleteCate(Request $request)
	{
		Book::where('stt_delete',0)->where('cate_id',$request->idcate)->update(['stt_delete'=>1]);
		Category::where('id',$request->idcate)->update(['stt_delete'=>1]);

		return response()->json(['success'=>redirect()->route('managecate')->with(['success-category'=>'Xóa danh mục thành công'])]);
	}
}
