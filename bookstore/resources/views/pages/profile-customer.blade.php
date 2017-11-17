@php
$cus_birthday = ($customer == null) ? null : $customer->birthday;
if($cus_birthday!=null){
    $date = date_parse_from_format("Y-m-d", $cus_birthday);
    $month = $date["month"];
    $year = $date["year"];
    $day = $date["day"];
}else{
    $month = null;
    $year = null;
    $day = null;
}

$cus_tel = ($customer == null) ? null : $customer->phone_number;

$id_city_cus = ($customer == null) ? null : $customer->id_city;
$id_district_cus = ($customer == null) ? null : $customer->id_district;
$id_ward_cus = ($customer == null) ? null : $customer->id_ward;

$cus_address = ($customer == null) ? null : $customer->address;
@endphp

@extends('master')
@section('title')
Thông tin cá nhân
@endsection
@section('content')
<!-- PAGE ADDRESS  -->
<section id="page-address">
    <div class="row page-address-wrap">
        <div class="small-12 medium-12 large-6 columns page-name">
            <span class="float-left c-sexy medium">TRANG CÁ NHÂN</span>
        </div>
        <div class="small-12 medium-12 large-6 columns page-add">
            <span class="float-right medium"><a href="" class="c-light">Trang chủ</a><a class="c-light">Thông tin cá nhân</a></span>
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

            {{-- success with flash-mess --}}
            @if (Session::has('success-update-profile'))    
            <div class="callout primary success-update-profile" style="margin-top: 20px">
                {{ Session::get('success-update-profile') }}
            </div>
            @endif

            {{-- errors --}}
            <div class="errors-update-profile" style="display: none;">
              <div class="callout alert" style="margin-top: 20px">
                <h5></h5>
                <ul><li></li></ul>
            </div>
        </div>


        <div class="row content-wrap-head">
            <span class="content-wrap-title float-left">Thông tin cá nhân</span>
        </div>

        <div class="my-info">
            <form id="profile-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <label for="">Họ tên <span style="color: red; font-size: 20px;">*</span> </label>
                    <input name="name" type="text" value="{{ Auth::user()->name }}">
                </div>
                <div>
                    <label for="">Email <span style="color: red; font-size: 20px;">*</span> </label>
                    <input name="email" type="text" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div>
                    <label for="">Giới tính <span style="color: red; font-size: 20px;">*</span></label>
                    <input type="radio" name="sex" id="Nam" <?php echo $customer==null ? '' : ($customer->gender == "Nam") ? 'checked' : '' ?> ><label for="Nam">Nam</label> 
                    <input type="radio" name="sex" id="Nữ" <?php echo $customer==null ? '' : ($customer->gender == "Nữ") ? 'checked' : '' ?> ><label for="Nữ">Nữ</label>
                </div>
                <div id="birthday-info">
                    <label for="">Ngày sinh <span style="color: red; font-size: 20px;">*</span> </label>

                    <select name="day" id="day" onchange="setDays(month,this,year)" class="my-date">
                        <option value=""></option>

                        @php
                        $max_day = ($customer==null)?31:getMaxday($month,$year);
                        @endphp

                        @for ($i = 1; $i <= $max_day ; $i++)
                        <option value="{{ $i }}" <?php echo ($day==null)?'':($day==$i)?"selected = 'selected'":''; ?> >{{ $i }}</option>
                        @endfor
                    </select>


                    <select name="month" id="month" onchange="setDays(this,day,year)" class="my-date">
                        <option value=""></option>
                        @for ($i = 1; $i < 13; $i++)
                        <option value="{{ $i }}" <?php echo ($month==null)?'':($month==$i)?"selected = 'selected'":''; ?> >Tháng {{ $i }}</option>
                        @endfor
                    </select>


                    <select name="year" id="year" onchange="setDays(month,day,this)" class="my-date">
                        <option value=""></option>
                        @for ($i = 1940; $i <= date("Y"); $i++)
                        <option value="{{ $i }}" <?php echo ($year==null)?'':($year==$i)?"selected = 'selected'":''; ?> >{{ $i }}</option>
                        @endfor
                    </select>

                </div>

                <div>
                    <label for="">SĐT <span style="color: red; font-size: 20px;">*</span> </label>
                    <input name="tel" type="text" value="{{ $cus_tel }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>

                <div>
                    <label for="">Tỉnh/Thành phố <span style="color: red; font-size: 20px;">*</span></label>

                    <select name="city-select" id="city-select">
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

                <select name="district-select" id="district-select">
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

                <select name="ward-select" id="ward-select">
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
                <input name="address" type="text" value="{{ $cus_address }}">
            </div>

            <div>
                <div class="row">
                    <a class="cart-button float-left" id="btn-update-profile">Cập nhật</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</main>
<!-- END MAIN PROFILE PAGE -->
@endsection