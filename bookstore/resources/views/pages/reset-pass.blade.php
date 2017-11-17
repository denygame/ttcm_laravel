@extends('master')
@section('title')
Đổi mật khẩu
@endsection
@section('content')
<!-- PAGE ADDRESS  -->
<section id="page-address">
    <div class="row page-address-wrap">
        <div class="small-12 medium-12 large-6 columns page-name">
            <span class="float-left c-sexy medium">TRANG CÁ NHÂN</span>
        </div>
        <div class="small-12 medium-12 large-6 columns page-add">
            <span class="float-right medium"><a href="" class="c-light">Trang chủ</a><a class="c-light">Đổi mật khẩu</a></span>
        </div>
    </div>
</section>
<!-- END PAGE ADDRESS -->

<!-- MAIN PROFILE PAGE -->
<main>
    <div class="row main-page-wrap">
        <div class="show-for-large large-3 columns left-nav">
            <span class="left-nav-title bold c-dark fluid-width"><i class="fa fa-user"></i> Tên cá nhân</span>
            <div class="left-nav-ul-wrap">
                <ul>
                    <li><a href="{{ route('profile') }}">Thông tin cá nhân</a></li>
                    <li><a href="{{ route('resetpass') }}">Đổi mật khẩu</a></li>
                    <li><a href="">Đơn hàng</a></li>
                </ul>
            </div>
        </div>
        <!-- MAIN CONTENT -->

        <div class="small-12 medium-12 large-9 columns content-wrap">

            {{-- errors --}}
            <div class="errors-reset-pass" style="display: none;">
              <div class="callout alert" style="margin-top: 20px">
                <h5></h5>
                <ul><li></li></ul>
            </div>
        </div>


        {{-- success with flash-mess --}}
        @if (Session::has('success-reset-pass'))    
        <div class="callout primary success-reset-pass" style="margin-top: 20px">
            {{ Session::get('success-reset-pass') }}
        </div>
        @endif


        <form id="reset-pass-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
            <div>
                <label for="">Mật khẩu cũ:</label>
                <input type="password" name="old-pass">
            </div>
            <div>
                <label for="">Mật khẩu mới:</label>
                <input type="password" name="new-pass">
            </div>
            <div>
                <label for="">Nhập lại mật khẩu mới:</label>
                <input type="password" name="confirm-pass">
            </div>

            
            <div>
                <div class="row">
                    <a class="cart-button float-left" id="btn-reset-pass">Cập nhật</a>
                </div>
            </div>
        </form>
    </div>
</div>
</main>
<!-- END MAIN PROFILE PAGE -->
@endsection