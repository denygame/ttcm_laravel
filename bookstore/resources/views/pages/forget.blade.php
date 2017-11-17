@extends('master')
@section('title')
  Quên mật khẩu?
@endsection
@section('content')
<!-- MAIN LOGIN PAGE -->
<main>
  <div class="row login-wrap">
    <form>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <span class="text-cap">Quên mật khẩu?</span>
      <div class="row login-form-wrap">
        <span>Địa chỉ Email *</span>
        <input type="text" name="">
        {{-- <span>Mật khẩu *</span>
        <input type="password" name="" > --}}
        {{-- <input type="checkbox" name=""><span style="display: inline;padding-left:10px">Remember me</span> --}}
        <div>
          <a href="" class="login-button c-dark light text-upp">Lấy lại mật khẩu</a>
        </div>
      </div> 
    </form>
  </div>
</main>
<!-- END MAIN LOGIN PAGE -->
@endsection