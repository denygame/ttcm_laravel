<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\Book;
use App\Category;
use App\User;
use App\Customer;
use App\City;
use App\District;
use App\Ward;
use App\Bill;
use App\Bill_Detail;
use App\SliderBanner;

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
		$slider=SliderBanner::where('id','<',4)->get();
		$banner=SliderBanner::where('id','>',4)->get();
		$logo=SliderBanner::find(4);
		return view('admin.pages.manage-general',compact('slider','banner','logo'));
	}

	public function getManageBook()
	{
		$listbook=Book::where('stt_delete',0)->get();
		return view('admin.pages.manage-book',compact('listbook'));
	}

	public function getAddBook()
	{
		$lscate=Category::where('stt_delete',0)->get();
		return view('admin.pages.add-book',compact('lscate'));
	}

	public function getManageCate()
	{
		$lscate=Category::where('stt_delete',0)->get();
		return view('admin.pages.manage-category',compact('lscate'));
	}

	public function getManageAcc()
	{
		$lsuser=User::all();
		return view('admin.pages.manage-account-customer',compact('lsuser'));
	}

	public function getManageBill()
	{
		$lsbill=Bill::where('stt_delete',0)->get();
		return view('admin.pages.manage-bill',compact('lsbill'));
	}

	public function getDetailBook($idbook)
	{
		$book = Book::where('stt_delete',0)->where('id',$idbook)->first();
		$lscate=Category::where('stt_delete',0)->get();
		return view('admin.pages.detail-book',compact('book','lscate'));
	}

	public function getDetailAcc($iduser)
	{
		$user=User::where('id',$iduser)->first();
		if($user!=null)
			$customer=Customer::where('note_user',$iduser)->first();
		else $customer=null;

		$list_city = City::all();

		if($customer!=null){
			$city_cus = City::where('id',$customer->id_city)->first();
			$list_district = District::where('city_id',$city_cus->id)->get();

			$district_cus = District::where('id',$customer->id_district)->first();
			$list_ward = Ward::where('district_id',$district_cus->id)->get();

			$billcus=Bill::where('id_customer',$customer->id)->select('id','date_bill','total_price')->get();
		}else{
			$list_district=null;
			$list_ward=null;
			$billcus=null;
		}

		return view('admin.pages.detail-account',compact('customer','list_city','list_district','list_ward','billcus'));
	}

	public function getDetailBill($type,$idbill,$idcustomer=null)
	{
		$lsbilldetail=Bill_Detail::where('bill_id',$idbill)->get();
		if($type!='bill')
			$customer=Customer::where('id',$idcustomer)->select('id','name')->first();
		else $customer=null;
		return view('admin.pages.detail-bill',compact('type','customer','lsbilldetail','idbill'));
	}
}
