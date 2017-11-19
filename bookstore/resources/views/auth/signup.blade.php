@extends('master')
@section('title')
Đăng Ký
@endsection
@section('content')
<!-- MAIN PRODUCT PAGE -->
<main>


  <div class="reveal" id="success-modal" data-reveal>
    <center><h3>Đăng ký tài khoản thành công!</h3></center>
    <center><p class="lead">Hãy cập nhật thông tin cá nhân của bạn</p></center>
    <center><p>Bookstore T2HD</p></center>
    <button class="register-close-btn close-button" data-close aria-label="Close modal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>




  <div class="row signup-wrap">

    {{-- errors --}}
    <div class="errors-register" style="display: none">
      <div class="callout warning" style="margin-top: 20px">
        <h5>Có lỗi xảy ra khi đăng ký</h5>
        <ul>
          <li></li>
        </ul>
      </div>
    </div>





    <form id="register-form">
      <meta name="_token" content="{{{ csrf_token() }}}"/>

      <span class="text-cap">ĐĂNG KÝ</span>
      <div class="row login-form-wrap">
        <span>Họ Tên *</span>
        <input type="text" name="full_name">

        <span>Email *</span>
        <input type="text" name="email">
        
        <span>Mật khẩu *</span>
        <input type="password" name="password">
        <span>Nhập lại mật khẩu *</span>
        <input type="password" name="re_password">

        <div>
          <button type="submit" class="login-button c-dark light text-upp register-button">Đăng ký tài khoản</button>
        </div>
      </div> 
    </form>
  </div>
</main>
<!-- END MAIN SIGNUP PAGE -->
@endsection