<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;
use Auth;
use App\ResetPassword;

class AccountController extends Controller
{
	public function getRegister()
	{
		if(Auth::check()){
			return redirect()->route('home');
		}
		return view('auth.signup');
	}

	public function postRegister(Request $request)
	{
		if(isset($_POST['_token'])){
			$validator = Validator::make($request->all(), $this->getRulesRegister(),$this->getMessagesRegister());


			if ($validator->passes()) {

				$user = new User;
				$user->email = $request->email;
				$user->name = $request->full_name;
				$user->password = Hash::make($request->password);
				$user->authorities = 0;//khách
				$user->save();

				return response()->json(['success'=>'Tạo tài khoản thành công','route'=>route('home')]);
			}

			return response()->json(['error'=>$validator->errors()->all()]);
		}		
	}


	private function getRulesRegister()
	{
		return [
			'email'=>'required|email|unique:users,email',
			'password'=>'required|min:6',
			'full_name'=>'required',
			're_password'=>'required|same:password'
		];
	}

	private function getMessagesRegister()
	{
		return [
			'full_name.required'=>'Họ tên không thể trống',
			'email.required'=>'Email không thể trống',
			'email.email'=>'Email không đúng định dạng',
			'email:unique'=>'Email đã có người sử dụng',
			'password.required'=>'Mật khẩu không thể trống',
			'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
			're_password.required'=>'Nhập lại mật khẩu không thể trống',
			're_password.same'=>'Mật khẩu nhập lại không chính xác'
		];
	}




	//login
	public function getLogin()
	{
		if(Auth::check()){
			return redirect()->route('home');
		}
		return view('auth.login');
	}


	public function postLogin(Request $request)
	{
		if(isset($_POST['_token'])){
			$validator = Validator::make($request->all(), $this->getRulesLogin(),$this->getMessagesLogin());

			if ($validator->passes()) {

				$auth = array('email' => $request->email, 'password' => $request->password);

				if(Auth::attempt($auth)){
					return response()->json(['message'=>'Đăng nhập thành công','type'=>1,'route'=>route('home') ]);
				}else{
					return response()->json(['message'=>'Đăng nhập thất bại','type'=>0]);
				}
			}
			return response()->json(['error'=>$validator->errors()->all()]);
		}
	}

	private function getRulesLogin()
	{
		return [
			'email'=>'required|email',
			'password'=>'required|min:6',
		];
	}

	private function getMessagesLogin()
	{
		return [
			'email.required'=>'Email không thể trống',
			'email.email'=>'Email không đúng định dạng',
			'password.required'=>'Mật khẩu không thể trống',
			'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
		];
	}


	public function logout()
	{
		Auth::logout();
		return redirect()->route('home');
	}


	public function resetPass(Request $request)
	{
		$validator = Validator::make($request->all(),
			[
				'old_pass'=>'required|min:6',
				'new_pass'=>'required|min:6',
				'confirm_pass'=>'required|same:new_pass'
			],

			[
				'old_pass.required'=>'Mật khẩu cũ không thể trống',
				'new_pass.required'=>'Mật khẩu mới không thể trống',
				'confirm_pass.required'=>'Mật khẩu nhập lại không thể trống',
				'old_pass.min'=>'Mật khẩu có ít nhất 6 ký tự',
				'new_pass.min'=>'Mật khẩu mới phải có ít nhất 6 ký tự',
				'confirm_pass.same'=>'Mật khẩu nhập lại không chính xác'
			]
		);

		if ($validator->passes()) {

			if(Hash::check($request->old_pass,Auth::user()->password)){
				$user_id = Auth::user()->id;
				$obj_user = User::find($user_id);
				$obj_user->password = Hash::make($request->new_pass);;
				$obj_user->save(); 

				return response()->json(['success'=>redirect()->route('profile')->with(['success-reset-pass'=>'Đổi mật khẩu thành công'])]);
			}else{
				return response()->json(['error'=>array('Mật khẩu cũ không chính xác')]);
			}
		}
		return response()->json(['error'=>$validator->errors()->all()]);
	}

	public function checkExitsEmail(Request $request)
	{
		$check = User::where('email',$request->email)->first();
		if($check!=null) return 'true';
		else return 'false';
	}

	public function getEmailReset($token)
	{
		$response = ResetPassword::select('token','email')->get();
		foreach ($response as $item) {
			if (Hash::check($token, $item->token)) {
				return $item->email;
				break;
			}
		}
		return null;
	}

	public function resetPassEmail(Request $request)
	{
		$validator = Validator::make($request->all(),
			[
				'password'=>'required|min:6',
				'confirm'=>'required|same:password'
			],

			[
				'password.required'=>'Mật khẩu không thể trống',
				'confirm.required'=>'Mật khẩu nhập lại không thể trống',
				'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
				'confirm.same'=>'Mật khẩu nhập lại không chính xác'
			]
		);

		if ($validator->passes()) {
			$user = User::where('email',$request->email)->first();
			if($user!=null){
				$user->password = Hash::make($request->password);
				$user->save();
				return response()->json(['success'=>route('login')]);
			}
			return response()->json(['error'=>'Có lỗi xãy ra']);
		}
		return response()->json(['error'=>$validator->errors()->all()]);
	}
}
