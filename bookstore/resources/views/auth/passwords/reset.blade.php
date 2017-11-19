@inject('account', 'App\Http\Controllers\AccountController')


@extends('master')
@section('title')
Khôi phục mật khẩu
@endsection
@section('content')
<!-- MAIN LOGIN PAGE -->
<main>
  <div class="row login-wrap">
    {{-- errors --}}
    <div class="errors-reset-pass-with-email" style="display: none;">
      <div class="callout alert" style="margin-top: 20px">
        <h5></h5>
        <ul><li></li></ul>
      </div>
    </div>

    <form id="frm-reset-pass">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <span class="text-cap">Khôi phục mật khẩu</span>
      <div class="row login-form-wrap">
        <span>Địa chỉ Email *</span>
        <input type="text" name="email" value="{{ $account->getEmailReset($token) }}" disabled="disabled">
        <span>Mật khẩu mới *</span>
        <input type="password" name="password" >
        <span>Nhập lại mật khẩu mới *</span>
        <input type="password" name="confirm" >
        
        <div>
          <a class="login-button c-dark light text-upp" id="btn-reset-pass-with-email">Xác nhận mật khẩu mới</a>
        </div>
      </div> 
    </form>
  </div>
</main>
<!-- END MAIN LOGIN PAGE -->
@endsection