@inject('cartController', 'App\Http\Controllers\CartController')



@php
$shopping_cart = $cartController->getContent();

$cus_name = ($customer==null) ? null : $customer->name;
$phone_number = $customer==null?null:$customer->phone_number;
$email = ($customer==null) ? null : $customer->email;
$address = ($customer==null) ? null : $customer->address;

$id_city_cus = ($customer == null) ? null : $customer->id_city;
$id_district_cus = ($customer == null) ? null : $customer->id_district;
$id_ward_cus = ($customer == null) ? null : $customer->id_ward;

@endphp

@extends('master')
@section('title')
Thanh toán
@endsection
@section('content')


@if ($cartController->getCount()==0)
<div class="row empty-cart-show center-content">
    <span>Giỏ hàng của bạn trống, không thể thanh toán!!!</span>
    <center>
      <div class="row horizontal-center">
        <a href="{{ route('category',changeTitle('sản phẩm nổi bật')) }}" class="cart-button">QUAY LẠI MUA HÀNG</a>
    </div>
</center>
</div>

@else

<!-- PAGE ADDRESS  -->
<section id="page-address">
    <div class="row page-address-wrap">
        <div class="small-12 medium-12 large-6 columns page-name">
            <span class="float-left c-sexy medium">THANH TOÁN</span>
        </div>
        <div class="small-12 medium-12 large-6 columns page-add">
          <span class="float-right medium">
            <a href="{{ route('home') }}" class="c-light">Trang chủ</a>
            <a class="c-light">  Thanh toán</a>
        </span>
    </div>
</div>
</section>
<!-- END PAGE ADDRESS -->

<main>
    <div class="row item-cart-show">
        {{-- errors --}}
        <div class="errors-checkout" style="display: none;">
          <div class="callout alert" style="margin-top: 20px">
            <h5></h5>
            <ul><li></li></ul>
        </div>
    </div>


    <div class="small-12 medium-12 large-9 columns cart-table">

        @if ($customer==null && Auth::check())
        <center>Bạn chưa cập nhật thông tin tài khoản <a href="{{ route('profile') }}" class="bold c-sexy forget-link" style="font-size: 14px;">click vào đây để cập nhật</a> hoặc <a href="{{ route('logout') }}" class="bold c-sexy forget-link" style="font-size: 14px;">click vào đây để đăng xuất</a></center>
        @endif

        <div class="row description-area">
            <ul class="tabs" data-tabs id="description-tabs">
                <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Thông tin</a></li>
                <li class="tabs-title"><a href="#panel2">Hình thức giao hàng/Thanh toán</a></li>
            </ul>
            <div class="tabs-content" data-tabs-content="description-tabs">
                <!--Thông tin-->
                <div class="tabs-panel is-active" id="panel1">
                    <form id="frm-info-order" class="my-info-checkout">
                        <div>
                            <label>Họ tên <span style="color: red;">*</span> </label>
                            <input type="text" name="name" value="{{ $cus_name }}" <?php if(Auth::check()) echo 'disabled';?> id="<?php if(Auth::check()) echo Auth::user()->id; else echo 0;?>">
                        </div>
                        <div>
                            <label for="">Điện thoại <span style="color: red; font-size: 20px;">*</span> </label>
                            <input type="text" name="tel" value="{{ $phone_number }}" <?php if(Auth::check())echo 'disabled';?>>
                        </div>
                        <div>
                            <label for="">Email <span style="color: red; font-size: 20px;">*</span> </label>
                            <input type="text" name="email" value="{{ $email }}" <?php if(Auth::check())echo 'disabled';?>>
                        </div>
                        <div>
                            <label for="">Tỉnh/Thành phố <span style="color: red; font-size: 20px;">*</span></label>
                            <select name="city-select" id="city-select" <?php if(Auth::check())echo 'disabled';?>>
                               <option value="">--- Chọn Tỉnh/Thành Phố ---</option>

                               @foreach ($list_city as $item)
                               @if ($id_city_cus==$item->id)
                               <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                               @else
                               <option value="{{ $item->id }}">{{ $item->name }}</option>
                               @endif
                               @endforeach

                           </select>
                       </div>
                       <div>
                        <label for="">Quận/Huyện <span style="color: red; font-size: 20px;">*</span> </label>
                        <select name="district-select" id="district-select" <?php if(Auth::check())echo 'disabled';?>>
                            <option value="">--- Chọn Quận/Huyện ---</option>

                            @if ($list_district!=null)
                            @foreach ($list_district as $item)
                            @if ($id_district_cus==$item->id)
                            <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                            @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                            @endforeach
                            @endif

                        </select>
                    </div>
                    <div>
                        <label for="">Phường/Xã <span style="color: red; font-size: 20px;">*</span> </label>
                        <select name="ward-select" id="ward-select" <?php if(Auth::check())echo 'disabled';?>>
                            <option value="">--- Chọn Phường/Xã ---</option>

                            @if ($list_ward!=null)
                            @foreach ($list_ward as $item)
                            @if ($id_ward_cus==$item->id)
                            <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                            @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                            @endforeach
                            @endif

                        </select>
                    </div>
                    <div>
                        <label for="">Địa chỉ <span style="color: red; font-size: 20px;">*</span> </label>
                        <input type="text" name="address" value="{{ $address }}" <?php if(Auth::check())echo 'disabled';?>>
                    </div>
                    <div>
                        <a onclick="backToTop();" class="my-popup">Bạn hãy tiếp tục chọn hình thức giao hàng và thanh toán !</a>
                    </div>
                </form>
            </div>

            <!--Hình thức giao hàng/thanh toán-->
            <div class="tabs-panel" id="panel2">
                <form id="frm-order-protocol">
                    <div>
                        <div class="my-info-checkout">
                            <b style="font-size: 20px;">1. Hình thức giao hàng <span style="color: red; font-size: 20px;">*</span></b>
                            <div style="border: 1px solid #bdc4c2; padding: 15px;">
                                <input type="radio" value="0" name="gh" id="gh-cham">
                                <label  for="gh-cham" >Giao hàng tiêu chuẩn (dự kiến giao hàng vào Thứ ba, 07/11/2017): Miễn Phí</label>
                                <br>
                                <input type="radio" value="1" name="gh" id="gh-nhanh" >
                                <label  for="gh-nhanh" style=" color: #cc4b37;">Giao hàng nhanh (dự kiến giao hàng trong 2 ngày)</label>
                            </div>
                        </div>

                        <div class="my-info-checkout">
                            <b style="font-size: 20px;">2. Người nhận hàng <span style="color: red; font-size: 20px;">*</span></b>
                            <div style="border: 1px solid #bdc4c2; padding: 15px;">
                                <input type="radio" value="0" name="nn" id="receive-me">
                                <label  for="receive-me" >Người nhận là tôi.</label>
                                <br>
                                <input type="radio" value="1" name="nn" id="receive-not-me" >
                                <label  for="receive-not-me" class="my-person-receive">Người nhận không phải tôi.</label>
                                <div class="person-receive">
                                    <div>
                                        <label for="">Họ tên người nhận <span style="color: red; font-size: 20px;">*</span></label>
                                        <input type="text" name="name">
                                    </div>
                                    <div>
                                        <label for="">Điện thoại <span style="color: red; font-size: 20px;">*</span> </label>
                                        <input type="text" name="tel">
                                    </div>
                                    <div>
                                        <label for="">Tỉnh/Thành phố <span style="color: red; font-size: 20px;">*</span></label>
                                        <select name="city-select1" id="city-select1">

                                           <option value="">--- Chọn Tỉnh/Thành Phố ---</option>

                                           @foreach ($list_city as $item)
                                           <option value="{{ $item->id }}">{{ $item->name }}</option>
                                           @endforeach

                                       </select>
                                   </div>
                                   <div>
                                    <label for="">Quận/Huyện <span style="color: red; font-size: 20px;">*</span> </label>

                                    <select name="district-select1" id="district-select1">
                                        <option value="">--- Chọn Quận/Huyện ---</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="">Phường/Xã <span style="color: red; font-size: 20px;">*</span> </label>

                                    <select name="ward-select1" id="ward-select1">
                                        <option value="">--- Chọn Phường/Xã ---</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="">Địa chỉ <span style="color: red; font-size: 20px;">*</span> </label>
                                    <input type="text" name="address">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-info-checkout">
                        <b style="font-size: 20px;">3. Hình thức thanh toán  <span style="color: red; font-size: 20px;">*</span></b>
                        <div  style="border: 1px solid #bdc4c2;padding:15px;">
                            <input type="radio" value="0" name="tt" id="cash">
                            <label id="" for="cash" >Thanh toán tiền mặt khi nhận hàng</label>
                            <br>
                            <input type="radio" value="1" name="tt" id="card">
                            <label id="" class="my-card" for="card">Thẻ ATM nội địa/Internet Banking (Miễn phí thanh toán)</label>
                            <div class="my-bank">
                                <ul>
                                    <li><button type="button" ><img src="source/img/bank/vietcombank.jpg" alt=""></button></li>
                                    <li><button type="button"><img src="source/img/bank/vietinbank.jpg" alt=""></button></li>
                                    <li><button type="button"><img src="source/img/bank/ACB.jpg" alt=""></button></li>
                                    <li><button type="button"><img src="source/img/bank/BIDV.jpg" alt=""></button></li>
                                    <li><button type="button"><img src="source/img/bank/sacombank.jpg" alt=""></button></li>
                                    <li><button type="button"><img src="source/img/bank/techcombank.jpg" alt=""></button></li>
                                    <li><button type="button"><img src="source/img/bank/TPbank.jpg" alt=""></button></li>
                                    <li><button type="button"><img src="source/img/bank/VIB.jpg" alt=""></button></li>
                                    <li><button type="button"><img src="source/img/bank/VPbank.jpg" alt=""></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row cart-action-wrap">
    <a href="{{ route('category',changeTitle('sản phẩm nổi bật')) }}" class="cart-button float-left">Tiếp tục mua hàng</a>
    <a href="{{ route('cart') }}" class="cart-button float-right">Trở về giỏ hàng</a>
</div>


</div>
<div class="small-12 medium-12 large-3 columns cart-total">
    <div class="total-table">
        <h4 class="medium">ĐƠN HÀNG:</h4>

        <!--Liệt kệ sp trong giỏ hàng-->
        @foreach ($shopping_cart as $item)
        <span class="float-left text-cap my-white"><span class="my-white">{{ $item->qty }}</span> x <span class="my-white">{{ $item->name }} </span> <span class="float-right bold my-white">{{ number_format($item->price * $item->qty) }}đ</span></span>
        @endforeach
        <!--Kết thúc list sp-->

        <span class="float-left text-cap">total <span class="float-right bold" style="font-size: 24px;line-height: 22px;">{{ $cartController->getTotal() }}đ</span></span>

        {{-- mail??? --}}
        <span class="center-content"><a id="btn-order" class="cart-button text-upp bold">ĐẶT HÀNG</a></span>
    </div>
</div>
</div>

</div>
</main>

@endif

@endsection

