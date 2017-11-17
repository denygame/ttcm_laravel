<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use Cart;
use Auth;
use App\Customer;
use App\City;
use App\District;
use App\Ward;


class PageController extends Controller
{			
	public function getHome()
	{
		return redirect()->route('home');
	}
	
	public function getIndex()
	{
		$new_books = Book::where('stt_delete', 0)->where('new',1)->orderBy('id','desc')->limit(5)->get();
		$hl_books = Book::where('stt_delete',0)->orderBy('highlight','desc')->limit(5)->get();
		$sold_books = Book::where('stt_delete',0)->orderBy('sold','desc')->limit(5)->get();
		return view('pages.index',compact('new_books','hl_books','sold_books'));
	}

	public function getProducts($alias)
	{
		$ls_cates = Category::where('stt_delete', 0)->get();
		$random_book = Book::where('stt_delete', 0)->inRandomOrder()->limit(2)->get();

		switch ($alias) {
			case 'san-pham-moi':
			$title = 'Sản phẩm mới';
			$ls_books = Book::where('stt_delete', 0)->where('new',1)->orderBy('id','desc')->paginate(8);
			$total_books = Book::where('stt_delete', 0)->where('new',1)->count();
			break;

			case 'san-pham-noi-bat':
			$title = 'Sản phẩm nổi bật';
			$ls_books = Book::where('stt_delete',0)->where('highlight','<>',0)->orderBy('highlight','desc')->paginate(8);
			$total_books = Book::where('stt_delete',0)->where('highlight', '<>' , 0)->count();
			break;

			case 'san-pham-ban-chay':
			$title = 'Sản phẩm bán chạy';
			$ls_books = Book::where('stt_delete',0)->where('sold','<>',0)->orderBy('sold','desc')->paginate(8);
			$total_books = Book::where('stt_delete',0)->where('sold', '<>' , 0)->count();
			break;

			default:
			$cate = Category::where('stt_delete', 0)->where('alias',$alias)->firstOrFail();    	
			$title = $cate->name;
			$ls_books = Book::where('stt_delete', 0)->where('cate_id',$cate->id)->paginate(8);
			$total_books = Book::where('stt_delete', 0)->where('cate_id',$cate->id)->count();
			break;
		}

		return view('pages.products',compact('ls_books','title','ls_cates','total_books','random_book'));
	}

	public function getDetail($title,$str_book)
	{
		$array = explode('+', $str_book);
		$book = Book::where('id',$array[0])->firstOrFail();
		$ls_cates = Category::where('stt_delete', 0)->get();
		$random_2book = Book::inRandomOrder()->limit(2)->get();

		switch ($title) {
			case 'san-pham-moi':
			$type = 'Sản phẩm mới';
			$random_4book = Book::where('stt_delete', 0)->where('new',1)->orderBy('id','desc')->inRandomOrder()->limit(4)->get();
			break;

			case 'san-pham-noi-bat':
			$type = 'Sản phẩm nổi bật';
			$random_4book = Book::where('stt_delete',0)->orderBy('highlight','desc')->inRandomOrder()->limit(4)->get();
			break;

			case 'san-pham-ban-chay':
			$type = 'Sản phẩm bán chạy';
			$random_4book = Book::where('stt_delete',0)->orderBy('sold','desc')->inRandomOrder()->limit(4)->get();
			break;

			default:
			$cate_id = $book->cate_id;
			$cate = Category::where('stt_delete', 0)->where('id',$cate_id)->firstOrFail();
			$type = $cate->name;
			$random_4book = Book::where('cate_id',$cate_id)->inRandomOrder()->limit(4)->get();
			break;
		}

		return view('pages.detail',compact('book','type','ls_cates','random_2book','random_4book'));
	}

	public function getProfile()
	{
		$customer = Customer::where('note_user',Auth::user()->id)->first();
		$list_city = City::all();
		if($customer!=null){
			$city_cus = City::where('id',$customer->id_city)->first();
			$list_district = District::where('city_id',$city_cus->id)->get();

			$district_cus = District::where('id',$customer->id_district)->first();
			$list_ward = Ward::where('district_id',$district_cus->id)->get();
		}else{
			$list_district=null;
			$list_ward=null;
		}
		
		return view('pages.profile-customer', compact('customer','list_city','list_district','list_ward'));
	}


	public function getShoppingCart()
	{
		return view('pages.cart');
	}

	public function getForget()
	{
		return view('pages.forget');
	}



	public function getBill()
	{
		return view('pages.bill');
	}

	public function getBillDetail()
	{
		return view('pages.bill-detail');
	}

	public function getCheckout()
	{
		$list_city = City::all();
		return view('pages.checkout',compact('list_city'));
	}


	public function getResetPass()
	{
		return view('pages.reset-pass');
	}


	

	
}
