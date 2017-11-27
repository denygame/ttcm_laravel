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

//ajax for send email reset pass
Route::post('check-exists-email','AccountController@checkExitsEmail');

//reset password
Route::group(['prefix' => 'password'], function() {
    // Password reset link request routes...
	Route::get('email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
	Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

	// Password reset routes...
	Route::get('reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');

	// ajax
	Route::post('reset-pass-after-email', 'AccountController@resetPassEmail')->name('password.reset');
});

Route::get('thanh-toan', ['as'=>'checkout','uses'=>'PageController@getCheckout']);

//ajax
Route::get('order-bill','OrderController@order');

Route::get('don-hang', ['as'=>'bill','uses'=>'PageController@getBill'])->middleware('login');;

Route::get('chi-tiet-don-hang/{id_bill}', ['as'=>'bill-detail','uses'=>'PageController@getBillDetail']);





Route::get('admin/',['as'=>'homeadmin','uses'=>'Admin\PageAdminController@getLogin']);
Route::get('admin/login',['as'=>'getadminlogin','uses'=>'Admin\PageAdminController@getLogin']);
Route::post('admin/login',['as'=>'postadminlogin','uses'=>'Admin\PageAdminController@postLogin']);
Route::get('admin/logout',['as'=>'adminlogout','uses'=>'Admin\PageAdminController@logout']);



Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
	Route::get('manage-general', ['as'=>'managegeneral','uses'=>'Admin\PageAdminController@getGeneral']);
	Route::get('manage-book', ['as'=>'managebook','uses'=>'Admin\PageAdminController@getManageBook']);
	Route::get('add-book', ['as'=>'addbook','uses'=>'Admin\PageAdminController@getAddBook']);
	Route::get('manage-category', ['as'=>'managecate','uses'=>'Admin\PageAdminController@getManageCate']);
	Route::get('manage-account-customer', ['as'=>'manageacc','uses'=>'Admin\PageAdminController@getManageAcc']);
	Route::get('manage-bill', ['as'=>'managebill','uses'=>'Admin\PageAdminController@getManageBill']);


	Route::get('detail-book/{idbook}', ['as'=>'detailbookadmin','uses'=>'Admin\PageAdminController@getDetailBook']);
	Route::get('detail-account/{iduser}', ['as'=>'detailaccount','uses'=>'Admin\PageAdminController@getDetailAcc']);
	Route::get('detail-bill/{type}/{idbill}/{idcustomer?}', ['as'=>'detailbill','uses'=>'Admin\PageAdminController@getDetailBill']);

	Route::post('post-general','GeneralController@updateGeneral')->name('postgeneral');
});

Route::post('insert-book','BookController@insertBook')->name('insertbook');
Route::post('update-book','BookController@updateBook')->name('updatebook');

Route::group(['prefix' => 'admin/ajax'], function() {
	Route::get('show-cate-update','Admin\AjaxAminController@showCate');
	Route::get('show-cate-delete','Admin\AjaxAminController@showCateDeleteConfirm');
	Route::post('update-cate','Admin\AjaxAminController@updateCate');
	Route::post('insert-cate','Admin\AjaxAminController@insertCate');
	Route::post('delete-cate','Admin\AjaxAminController@deleteCate');
});