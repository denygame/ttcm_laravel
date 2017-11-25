<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\Book;
use App\Category;

class PageAdminController extends Controller
{
	public function getLogin()
	{
		if(Auth::guard('admin')->check()){
			return redirect()->route('managegeneral');
		}
		return view('admin.auth.login');
	}

	public function postLogin(Request $request)
	{
		$validator = Validator::make($request->all(), 
			[
				'username'=>'required',
				'password'=>'required|min:6'
			]
		);

		$auth = array('username' => $request->username, 'password' => $request->password);

		if(Auth::guard('admin')->attempt($auth)){
			return redirect()->intended(route('managegeneral'));
		}

		return redirect()->back()->with(['username'=>$request->username]);
	}

	public function logout()
	{
		Auth::guard('admin')->logout();
		return redirect()->route('getadminlogin');
	}


	public function getGeneral()
	{
		return view('admin.pages.manage-general');
	}

	public function getManageBook()
	{
		$listbook=Book::where('stt_delete',0)->get();
		return view('admin.pages.manage-book',compact('listbook'));
	}

	public function getAddBook()
	{
		return view('admin.pages.add-book');
	}

	public function getManageCate()
	{
		return view('admin.pages.manage-category');
	}

	public function getManageAcc()
	{
		return view('admin.pages.manage-account-customer');
	}

	public function getManageBill()
	{
		return view('admin.pages.manage-bill');
	}

	public function getDetailBook($idbook)
	{
		$book = Book::where('stt_delete',0)->where('id',$idbook)->first();
		$lscate=Category::where('stt_delete',0)->get();
		return view('admin.pages.detail-book',compact('book','lscate'));
	}

	public function getDetailAcc()
	{
		return view('admin.pages.detail-account');
	}

	public function getDetailBill($type)
	{
		return view('admin.pages.detail-bill',compact('type'));
	}
}
