<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Customer;
use App\Bill;
use App\Bill_Detail;
use App\City;
use App\District;
use App\Ward;
use Carbon\Carbon;
use Cart;
use Mail;

class OrderController extends Controller
{
	public function order(Request $req)
	{
		$validator = Validator::make($req->all(),
			[
				'email'=>'required|email',
				'name'=>'required',
				'tel'=>'required',
				'address'=>'required',
				'id_city'=>'required',
				'id_district'=>'required',
				'id_ward'=>'required',
				'gh'=>'required',
				'nn'=>'required',
				'tt'=>'required'
			],
			[
				'email'=>'Email nhập không đúng định dạng',
				'email.required'=>'Vui lòng nhập email',
				'name.required'=>'Vui lòng nhập họ tên',
				'tel.required'=>'Vui lòng nhập số điện thoại',
				'id_city.required'=>'Bạn chưa chọn thành phố',
				'id_district.required'=>'Bạn chưa chọn quận huyện',
				'id_ward.required'=>'Bạn chưa chọn phường xã',
				'address.required'=>'Vui lòng nhập địa chỉ',
				'gh.required'=>'Bạn chưa chọn hình thức giao hàng',
				'nn.required'=>'Bạn chưa chọn người nhận hàng',
				'tt.required'=>'Bạn chưa chọn hình thức thanh toán'
			]
		);

		if($validator->passes()){
			if($req->id_user!=0)
				$customer = Customer::where('note_user',$req->id_user)->first();
			else
				$customer = $this->createCustomer($req);

			$info_bill = $this->saveBill($req,$customer);

			$this->saveBillDetail($info_bill['idbill']);

			$this->sendMailOrder($req,$info_bill['time']);

			Cart::destroy();

			return response()->json(['success'=>'ok','route'=>route('home')]);
		}

		return response()->json(['error'=>$validator->errors()->all()]);
	}


	private function saveBill($req,$customer)
	{
		$total = 0;
		foreach (Cart::content() as $item)
			$total+=$item->price*$item->qty;

		$bill = new Bill;
		$bill->id_customer = $customer->id;
		$bill->date_bill = Carbon::now();
		$bill->total_price = $total;
		if($req->gh==0)
			$bill->ship = 'Giao hàng tiêu chuẩn (Miễn phí)';
		else $bill->ship = 'Giao hàng nhanh';

		$city=City::where('id',$req->id_city)->first();
		$district=District::where('id',$req->id_district)->first();
		$ward=Ward::where('id',$req->id_ward)->first();

		if ($req->nn==0) {
			$people_recv=$this->getInfoReceive($req->name,$req->tel,$city->name,$district->name,$ward->name,$req->address,'(Người nhận là customer có id: '.$customer->id.')');

			$bill->people_recv = $people_recv;
		}else{

			$city1=City::where('id',$req->id_city1)->first();
			$district1=District::where('id',$req->id_district1)->first();
			$ward1=Ward::where('id',$req->id_ward1)->first();

			$people_recv=$this->getInfoReceive($req->name,$req->tel,$city->name,$district->name,$ward->name,$req->address,'(Người đặt là customer có id: '.$customer->id.')');

			$people_recv=$people_recv . $this->getInfoReceive($req->name1,$req->tel1,$city1->name,$district1->name,$ward1->name,$req->address1,'(Người nhận)');

			$bill->people_recv = $people_recv;
		}

		if($req->tt==0)
			$bill->type_checkout='Thanh toán khi nhận hàng';
		else $bill->type_checkout='Thanh toán qua ATM';
		$bill->save();

		return ['idbill'=>$bill->id,'time'=>$bill->date_bill];
	}

	private function getInfoReceive($name,$tel,$city,$district,$ward,$address,$type)
	{
		return nl2br("--> Thông tin: ".$type."\n + Họ tên: ".$name."\n + Số điện thoại: ".$tel."\n + Thành phố: ".$city.", Quận huyện: ".$district.", Phường xã: ".$ward."\n + Địa chỉ: ".$address."\n");
	}

	private function saveBillDetail($id_bill)
	{
		foreach (Cart::content() as $item) {
			$bd = new Bill_Detail;
			$bd->bill_id=$id_bill;
			$bd->book_id=$item->id;
			$bd->quantity=$item->qty;
			$bd->price=$item->price;
			$bd->save();
		}
	}


	private function sendMailOrder($req,$time)
	{
		$input = $req->all();
		$data = array('email'=>$input["email"], 'content'=>Cart::content(),'time'=>$time,'total'=>Cart::subtotal());

		Mail::send('emails.mail-order', $data , function($message) use ($input,$time)
		{
			$message->from('t2hd.faceshop@gmail.com','T2HD Bookstore');
			$message->to($input["email"], $input['name'])->subject('Nhận đặt sách vào lúc '.$time);
		});

	}

	private function createCustomer($req)
	{
		$customer = new Customer;
		$customer->name = $req->name;
		$customer->email = $req->email;
		$customer->phone_number	=$req->tel;
		$customer->id_city = $req->id_city;
		$customer->id_district = $req->id_district;
		$customer->id_ward = $req->id_ward;
		$customer->address = $req->address;
		$customer->save();

		return $customer;
	}
}
