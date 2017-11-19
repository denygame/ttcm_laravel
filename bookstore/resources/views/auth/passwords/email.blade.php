@extends('master')
@section('title')
Quên mật khẩu?
@endsection
@section('content')
<!-- MAIN LOGIN PAGE -->
<main>
  <div class="row login-wrap">

    {{-- errors --}}
    <div class="errors-forgot-pass" style="display: none;">
      <div class="callout alert" style="margin-top: 20px">
        <h5></h5>
      </div>
    </div>


    <form id="frm-forgot-pass" method="POST" action="{{ url('/password/email') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <span class="text-cap">Quên mật khẩu?</span>
      <div class="row login-form-wrap">
        <span>Địa chỉ Email *</span>
        <input type="email" name="email">

        <div>
          <button type="submit" class="login-button c-dark light text-upp" id="btn-forgot-pass">Lấy lại mật khẩu</button>
        </div>

      </div> 
    </form>
  </div>
</main>
<!-- END MAIN LOGIN PAGE -->
@endsection