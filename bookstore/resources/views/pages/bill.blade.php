@extends('master')
@section('title')
Đơn hàng
@endsection
@section('content')
<!-- PAGE ADDRESS  -->
<section id="page-address">
    <div class="row page-address-wrap">
        <div class="small-12 medium-12 large-6 columns page-name">
            <span class="float-left c-sexy medium">TRANG CÁ NHÂN</span>
        </div>
        <div class="small-12 medium-12 large-6 columns page-add">
            <span class="float-right medium"><a href="" class="c-light">Trang chủ</a><a href="" class="c-light">Đơn hàng </a></span>
        </div>
    </div>
</section>
<!-- END PAGE ADDRESS -->

<!-- MAIN BILL PAGE -->
<main>
    <div class="row main-page-wrap">
        <div class="show-for-large large-3 columns left-nav">
            <span class="left-nav-title bold c-dark fluid-width"><i class="fa fa-user"></i> Tên cá nhân</span>
            <div class="left-nav-ul-wrap">
                <ul>
                    <li><a href="{{ route('profile') }}">Thông tin cá nhân</a></li>
                    <li><a href="{{ route('resetpass') }}">Đổi mật khẩu</a></li>
                    <li><a href="{{ route('bill') }}">Đơn hàng</a></li>
                </ul>
            </div>
        </div>
        <!-- MAIN CONTENT -->
        <div class="small-12 medium-12 large-9 columns content-wrap">
            <div class="row content-wrap-head">
                <span class="content-wrap-title float-left">Đơn hàng</span>
                <select>
                    <option>Mặc đinh</option>
                    <option>Đơn hàng mới</option>
                    <option>Đơn hàng đã nhận</option>
                    <option>Đơn hàng đã hủy</option>
                </select>
            </div>

            @if ($ls_bills==null)


            <!--NẾU CHƯA CÓ ĐƠN HÀNG NÀO-->
            <div class="none-bill">
                <h3>Bạn chưa có đơn hàng nào.</h3>
                <br>
                <a href="{{ route('home') }}"><i class="fa fa-hand-o-right"></i> Hãy về trang chủ để mua hàng nào !!!</a>
            </div>

            @else

            <!--NẾÚ CÓ ĐƠN HÀNG-->
            <div class="table-bill-wrap centered">
                <table class="cart-items-table">
                    <thead>
                        <tr>
                            <th width="20%">Mã đơn hàng</th>
                            <th width="20%">Ngày đặt hàng</th>
                            <th width="20%">Tổng giá trị</th>
                            <th width="10%">Trạng thái</th>
                            <th width="10%">Chi tiết</th>
                            <th width="3%"></th>
                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($ls_bills as $item)
                        <tr class="cart-item-row">
                            <td>
                                <div class="td-id-bill">
                                    <span>{{ $item->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="td-date-bill">
                                    <span>{{ $item->date_bill }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="td-total-bill">
                                    <span>{{ number_format($item->total_price) }} VNĐ</span>
                                </div>
                            </td>
                            <td>
                                <div class="td-status-bill">
                                    <span>{{ $item->status }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="td-info-bill">
                                    <span><a href="{{ route('bill-detail',$item->id) }}">Chi tiết</a></span>
                                </div>
                            </td>
                            <td>
                                <div class="td-del-wrap">
                                    <i class="fa fa-times-circle"></i>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif


                    </tbody>
                </table>
                <!--Phân trang-->
                <div>

                    @if ($ls_bills!=null)
                    @include('pages.pagination.page-bill',['total_bills'=>$total_bills,'ls_bills'=>$ls_bills])
                    @endif

                </div>
                <!--End phân trang-->
            </div>
            <!--KẾT THÚC DANH SÁCH ĐƠN HÀNG-->
        </div>
    </div>
</main>
<!-- END MAIN BILL PAGE -->
@endsection