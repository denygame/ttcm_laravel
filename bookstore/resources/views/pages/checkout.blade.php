@inject('cartController', 'App\Http\Controllers\CartController')

@php
$shopping_cart = $cartController->getContent();
@endphp

@extends('master')
@section('title')
Thanh toán
@endsection
@section('content')
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
        <div class="small-12 medium-12 large-9 columns cart-table">
            <div class="row description-area">
                <ul class="tabs" data-tabs id="description-tabs">
                    <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Thông tin</a></li>
                    <li class="tabs-title"><a href="#panel2">Hình thức giao hàng/Thanh toán</a></li>
                </ul>
                <div class="tabs-content" data-tabs-content="description-tabs">
                    <!--Thông tin-->
                    <div class="tabs-panel is-active" id="panel1">
                        <form action="" class="my-info-checkout">
                            <div>
                                <label>Họ tên <span style="color: red;">*</span> </label>
                                <input type="text">
                            </div>
                            <div>
                                <label for="">Điện thoại <span style="color: red; font-size: 20px;">*</span> </label>
                                <input type="text">
                            </div>
                            <div>
                                <label for="">Email <span style="color: red; font-size: 20px;">*</span> </label>
                                <input type="text">
                            </div>
                            <div>
                                <label for="">Tỉnh/Thành phố <span style="color: red; font-size: 20px;">*</span></label>
                                <select name="city-select" id="city-select">

                                 <option value="">--- Chọn Tỉnh/Thành Phố ---</option>

                                 @foreach ($list_city as $item)
                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                                 @endforeach

                             </select>
                         </div>
                         <div>
                            <label for="">Quận/Huyện <span style="color: red; font-size: 20px;">*</span> </label>
                            <select name="district-select" id="district-select">
                                <option value="">--- Chọn Quận/Huyện ---</option>
                            </select>
                        </div>
                        <div>
                            <label for="">Phường/Xã <span style="color: red; font-size: 20px;">*</span> </label>
                            <select name="ward-select" id="ward-select">
                                <option value="">--- Chọn Phường/Xã ---</option>
                            </select>
                        </div>
                        <div>
                            <label for="">Địa chỉ <span style="color: red; font-size: 20px;">*</span> </label>
                            <input type="text">
                        </div>
                        <div>
                            <a href="#description-tabs" class="my-popup">Bạn hãy tiếp tục chọn hình thức giao hàng và thanh toán !</a>
                        </div>
                    </form>
                </div>

                <!--Hình thức giao hàng/thanh toán-->
                <div class="tabs-panel" id="panel2">
                    <form action="">
                        <div>
                            <div class="my-info-checkout">
                                <b style="font-size: 20px;">1. Hình thức giao hàng <span style="color: red; font-size: 20px;">*</span></b>
                                <div style="border: 1px solid #bdc4c2; padding: 15px;">
                                    <input type="radio" value="" name="gh" id="gh-cham">
                                    <label  for="gh-cham" >Giao hàng tiêu chuẩn (dự kiến giao hàng vào Thứ ba, 07/11/2017): Miễn Phí</label>
                                    <br>
                                    <input type="radio" value="" name="gh" id="gh-nhanh" >
                                    <label  for="gh-nhanh" style=" color: #cc4b37;">Giao hàng nhanh (dự kiến giao hàng trong 2 ngày)</label>
                                </div>
                            </div>

                            <div class="my-info-checkout">
                                <b style="font-size: 20px;">2. Người nhận hàng <span style="color: red; font-size: 20px;">*</span></b>
                                <div style="border: 1px solid #bdc4c2; padding: 15px;">
                                    <input type="radio" value="" name="nn" id="receive-me">
                                    <label  for="receive-me" >Người nhận là tôi.</label>
                                    <br>
                                    <input type="radio" value="" name="nn" id="receive-not-me" >
                                    <label  for="receive-not-me" class="my-person-receive">Người nhận không phải tôi.</label>
                                    <div class="person-receive">
                                        <div>
                                            <label for="">Họ tên người nhận <span style="color: red; font-size: 20px;">*</span></label>
                                            <input type="text">
                                        </div>
                                        <div>
                                            <label for="">Điện thoại <span style="color: red; font-size: 20px;">*</span> </label>
                                            <input type="text">
                                        </div>
                                        <div>
                                            <label for="">Tỉnh/Thành phố <span style="color: red; font-size: 20px;">*</span></label>
                                            <select name="city-select" id="city-select">

                                             <option value="">--- Chọn Tỉnh/Thành Phố ---</option>

                                             @foreach ($list_city as $item)
                                             <option value="{{ $item->id }}">{{ $item->name }}</option>
                                             @endforeach

                                         </select>
                                     </div>
                                     <div>
                                        <label for="">Quận/Huyện <span style="color: red; font-size: 20px;">*</span> </label>

                                        <select name="district-select" id="district-select">
                                            <option value="">--- Chọn Quận/Huyện ---</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Phường/Xã <span style="color: red; font-size: 20px;">*</span> </label>

                                        <select name="ward-select" id="ward-select">
                                            <option value="">--- Chọn Phường/Xã ---</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Địa chỉ <span style="color: red; font-size: 20px;">*</span> </label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-info-checkout">
                            <b style="font-size: 20px;">3. Hình thức thanh toán  <span style="color: red; font-size: 20px;">*</span></b>
                            <div  style="border: 1px solid #bdc4c2;padding:15px;">
                                <input type="radio" value="" name="tt" id="cash">
                                <label id="" for="cash" >Thanh toán tiền mặt khi nhận hàng</label>
                                <br>
                                <input type="radio" value="" name="tt" id="card">
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
        <span class="center-content"><a href="" class="cart-button text-upp bold">ĐẶT HÀNG</a></span>
    </div>
</div>
</div>

</div>
</main>
@endsection