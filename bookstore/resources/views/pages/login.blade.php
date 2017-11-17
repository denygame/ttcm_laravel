@extends('master')
@section('title')
  Đăng nhập
@endsection
@section('content')
<!-- MAIN LOGIN PAGE -->
<main>
  <div class="row login-wrap">
    <form id="page-login">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <span class="text-cap"> Đăng nhập</span>
      <div class="row login-form-wrap">
        <span>Địa chỉ Email *</span>
        <input type="text" name="email">
        <span>Mật khẩu *</span>
        <input type="password" name="password" >
        {{-- <input type="checkbox" name=""><span style="display: inline;padding-left:10px">Remember me</span> --}}
        <div>
          <a class="login-button c-dark light text-upp page-login-button">Đăng nhập</a>
        </div>
      </div> 
    </form>
  </div>
</main>
<!-- END MAIN LOGIN PAGE -->
@endsection