<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use Validator;

class CustomerController extends Controller
{
	public function update_profile(Request $request)
	{
		$validator = Validator::make($request->all(), $this->getRulesProfile(), $this->getMessProfile());

		if($validator->passes()){

			$user = User::where('email',$request->email)->first();
			$customer_exists = Customer::where('note_user',$user->id)->first();

	// vì đang trả về ajax nên trả về route with session, sau đó trong ajax gọi hàm location.reload()
			if($customer_exists==null){
				$user->name = $request->name;
				$new_cus = new Customer;
				$new_cus->name = $request->name;
				$new_cus->gender = $request->sex;
				$new_cus->email = $request->email;
				$new_cus->phone_number = $request->tel;
				$new_cus->id_city = $request->id_city;
				$new_cus->id_district = $request->id_district;
				$new_cus->id_ward = $request->id_ward;
				$new_cus->address = $request->address;
				$new_cus->birthday = $request->year."-".$request->month."-".$request->day;
				$new_cus->note_user = $user->id;

				$new_cus->save();
				$user->save();

				return response()->json(['success'=>redirect()->route('profile')->with(['success-update-profile'=>'Cập nhật dữ liệu thành công'])]);
			}else{
				$user->name = $request->name;
				$customer_exists->name = $request->name;
				$customer_exists->gender = $request->sex;
				$customer_exists->email = $request->email;
				$customer_exists->phone_number = $request->tel;
				$customer_exists->id_city = $request->id_city;
				$customer_exists->id_district = $request->id_district;
				$customer_exists->id_ward = $request->id_ward;
				$customer_exists->address = $request->address;
				$customer_exists->birthday = $request->year."-".$request->month."-".$request->day;
				
				$customer_exists->save();
				$user->save();

				return response()->json(['success'=>redirect()->route('profile')->with(['success-update-profile'=>'Cập nhật dữ liệu thành công'])]);
			}
		}

		return response()->json(['error'=>$validator->errors()->all()]);

	}

	private function getRulesProfile()
	{
		return [
			'name'=>'required',
			'sex'=>'required',
			'tel'=>'required',
			'id_city'=>'required',
			'id_district'=>'required',
			'id_ward'=>'required',
			'year'=>'required',
			'month'=>'required',
			'day'=>'required',
			'address'=>'required'
		];
	}

	private function getMessProfile()
	{
		return [
			'name.required'=>'Bạn phải nhập họ tên',
			'sex.required'=>'Bạn phải chọn giới tính',
			'tel.required'=>'Bạn phải nhập số điện thoại',
			'id_city.required'=>'Bạn phải chọn tỉnh thành',
			'id_district.required'=>'Bạn phải chọn quận huyện',
			'id_ward.required'=>'Bạn phải chọn phường xã',
			'day.required'=>'Bạn chưa chọn ngày sinh',
			'month.required'=>'Bạn chưa chọn tháng sinh',
			'year.required'=>'Bạn chưa chọn năm sinh',
		];
	}

}
