@inject('cartController', 'App\Http\Controllers\CartController')

@php
$shopping_cart = $cartController->getContent();
@endphp

@extends('master')

@section('title')
Giỏ Hàng
@endsection

@section('content')

<section id="page-address">
  <div class="row page-address-wrap">
    <div class="small-12 medium-12 large-6 columns page-name">
      <span class="float-left c-sexy medium">GIỎ HÀNG</span>
    </div>
    <div class="small-12 medium-12 large-6 columns page-add">
      <span class="float-right medium">
        <a href="{{ route('home') }}" class="c-light">Trang chủ</a>
        <a class="c-light">Giỏ hàng</a>
      </span>
    </div>
  </div>
</section>


<main>

  @if ($cartController->getCount()==0)

  <div class="row empty-cart-show center-content">
    <span>Giỏ hàng của bạn trống!!!</span>
    <center>
      <div class="row horizontal-center">
        <a href="{{ route('category',changeTitle('sản phẩm nổi bật')) }}" class="cart-button">QUAY LẠI MUA HÀNG</a>
      </div>
    </center>
  </div><!-- END EMPTY CART -->

  @else

  <div class="row item-cart-show">
    <div class="small-12 medium-12 large-9 columns cart-table">
      <div class="table-cart-wrap centered">
        <table class="cart-items-table">
          <thead>
            <tr>
              <th>Tên sản phẩm</th>
              <th width="12%">Gía</th>
              <th width="10%">Số lượng</th>
              <th width="12%">Thành tiền</th>
              <th width="8%"></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($shopping_cart as $item)
            @php
            $infoRoute = $cartController->getInfoRoute($item->id);
            @endphp

            <tr class="cart-item-row" id="{{ $item->rowId }}">
              <td>
                <div class="td-img-wrap hide-for-small-only">
                  <a href="{{ route('detail',['title' => $infoRoute['title'], 'str_book' => $infoRoute['str_book'] ]) }}">
                    <img src="upload/products/{{ $item->options['img'] }}">
                  </a>
                </div>
                <div class="td-name-wrap">
                  <a href="{{ route('detail',['title' => $infoRoute['title'], 'str_book' => $infoRoute['str_book'] ]) }}">{{ $item->name }}</a>
                </div>
              </td>
              <td>
                <div class="td-price-wrap">
                  <span>{{ number_format($item->price) }}đ</span>
                </div>
              </td>
              <td>
                <div class="td-quantity-wrap" id="{{ $item->rowId }}">
                  <span>                          
                    <input type="number" name="" value="{{ $item->qty }}" min="1" class="input-qty-cart" id="input-qty-cart">
                  </span>
                </div>
              </td>
              <td>
                <div class="td-total-wrap">
                  <span>{{ number_format($item->price * $item->qty) }}đ</span>
                </div>
              </td>
              <td>
                <div class="td-del-wrap" id="{{ $item->rowId }}">
                  <i class="fa fa-times-circle"></i>
                </div>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>

      </div>

      <div class="row cart-action-wrap">
        <a href="{{ route('category',changeTitle('sản phẩm nổi bật')) }}" class="cart-button float-left">Tiếp tục mua hàng</a>
      </div>
      <div class="row coupon-wrap">
        <form>
          <span class="bold text-upp c-sexy">COUpon:</span>
          <input type="text" name="" placeholder="Your coupon code ...">
          <a href="" class="coupon-button c-clear text-upp">Apply coupon</a>
        </form>
      </div>
    </div>


    <div class="small-12 medium-12 large-3 columns cart-total">
      <div class="total-table">
        <h4 class="medium">TỔNG CỘNG</h4>

        @foreach ($shopping_cart as $item)
        <span class="float-left text-cap">{{ $item->name }} x {{ $item->qty }} <span class="float-right bold">{{ number_format($item->price * $item->qty) }}đ</span></span>
        @endforeach
        
        <span class="float-left text-cap">total <span class="float-right bold" style="font-size: 24px;line-height: 22px;">{{ $cartController->getTotal() }}đ</span></span>
        <span class="center-content"><a href="{{ route('checkout') }}" class="cart-button text-upp bold">THANH TOÁN</a></span>
      </div>
    </div>
  </div>

</div>

@endif

</main>
@endsection