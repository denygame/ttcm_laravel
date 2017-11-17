<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@getHome');

Route::get('trang-chu', ['as'=>'home','uses'=>'PageController@getIndex']);

Route::get('danh-muc/{alias}', ['as'=>'category','uses'=>'PageController@getProducts']);

Route::get('chi-tiet-sach/{title}/{str_book}', ['as'=>'detail','uses'=>'PageController@getDetail']);

Route::get('gio-hang', ['as'=>'cart','uses'=>'PageController@getShoppingCart']);

//add product to cart (ajax)
Route::get('add-book-cart', ['as'=>'addbookcart', 'uses'=>'CartController@add']);

Route::get('update-book-cart', ['as'=>'updatebookcart', 'uses'=>'CartController@update']);

Route::get('remove-book-cart', ['as'=>'removebookcart', 'uses'=>'CartController@remove']);

Route::get('add-book-cart-qty', ['as'=>'addcartqty', 'uses'=>'CartController@addMany']);



Route::get('dang-ky', ['as'=>'register','uses'=>'AccountController@getRegister']);

//use for ajax when register
Route::post('post-register', ['as'=>'post-register','uses'=>'AccountController@postRegister']);

Route::get('dang-nhap', ['as'=>'login','uses'=>'AccountController@getLogin']);

// ajax post login
Route::post('post-login', ['as'=>'post-login','uses'=>'AccountController@postLogin']);

Route::get('quen-mat-khau', ['as'=>'forget','uses'=>'PageController@getForget']);

Route::get('dang-xuat',['as'=>'logout','uses'=>'AccountController@logout']);

Route::get('thong-tin-ca-nhan', ['as'=>'profile','uses'=>'PageController@getProfile'])
->middleware('login');

//ajax for select area
Route::get('get-district-by-id-city',['as'=>'getDistrict','uses'=>'AreaController@getDistrict']);
Route::get('get-ward-by-id-district',['as'=>'getWard','uses'=>'AreaController@getWard']);

// ajax update - profile
Route::post('update-profile', ['as'=>'updateProfile','uses'=>'CustomerController@update_profile']);


Route::get('doi-mat-khau',['as'=>'resetpass','uses'=>'PageController@getResetPass'])
->middleware('login');

Route::post('reset-pw-post', ['as'=>'resetPass','uses'=>'AccountController@resetPass']);









Route::get('test', function(){
	if(Auth::attempt(['email'=>'thanhhuy96.gtvt@gmail.com','password'=>'123456'])){
		echo 'thanh cong';
	}
	else
		echo 'that bai';
});

Route::get('destroy',function(){
	Auth::logout();
});

Route::get('aaaa', function() {
    echo Cart::content();
});






Route::get('thanh-toan', ['as'=>'checkout','uses'=>'PageController@getCheckout']);



Route::get('bill', [
	'as'=>'danh-sach-hoa-don',
	'uses'=>'PageController@getBill'
]);

Route::get('bill-detail', [
	'as'=>'chi-tiet-hoa-don',
	'uses'=>'PageController@getBillDetail'
]);










