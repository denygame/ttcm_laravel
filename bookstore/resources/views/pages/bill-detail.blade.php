@php
  use App\Http\Controllers\CateController;
@endphp

@extends('master')
@section('title')
Chi tiết đơn hàng {{ $id_bill }}
@endsection
@section('content')
<!-- PAGE ADDRESS  -->
<section id="page-address">
    <div class="row page-address-wrap">
        <div class="small-12 medium-12 large-6 columns page-name">
            <span class="float-left c-sexy medium">TRANG CÁ NHÂN</span>
        </div>
        <div class="small-12 medium-12 large-6 columns page-add">
            <span class="float-right medium">
                <a href="" class="c-light">Trang chủ</a>
                <a href="" class="c-light">Đơn hàng</a><a href="" class="c-light">Đơn hàng chi tiết</a>
            </span>
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
                <span class="content-wrap-title float-left">Đơn hàng chi tiết</span>
            </div>

            @if ($bill==null)

            <!--NẾU CHƯA CÓ ĐƠN HÀNG NÀO-->
            <div class="none-bill">
                <h3>Có lỗi xảy ra với mã đơn hàng</h3>
                <br>
                <a href="{{ route('bill') }}"><i class="fa fa-hand-o-right"></i> Hãy về trang đơn hàng để kiểm tra !!!</a>
            </div>

            @else

            <!--NẾÚ CÓ ĐƠN HÀNG-->
            <div class="row description-area">
                <ul class="tabs" data-tabs id="description-tabs">
                    <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Thông tin đơn hàng</a></li>
                    <li class="tabs-title"><a href="#panel2">Sản phẩm đã chọn</a></li>
                </ul>
                <div class="tabs-content" data-tabs-content="description-tabs">
                    <!--Thông tin đơn hàng-->
                    <div class="tabs-panel is-active" id="panel1">
                        <form action="">
                            <div>
                                <label for="">Mã đơn hàng:</label>
                                <input type="text" value="{{ $bill->id }}" disabled>
                            </div>
                            <div>
                                <label for="">Ngày đặt hàng:</label>
                                <input type="text" value="{{ $bill->date_bill }}" disabled>
                            </div>
                            <div>
                                <label for="">Giá trị đơn hàng:</label>
                                <input type="text" value="{{ number_format($bill->total_price) }} VNĐ" disabled>
                            </div>
                            <div style="font-weight: bold; font-size: 18px; color: black;">
                                <?php echo $bill->people_recv; ?>
                            </div>
                            
                        </form>
                    </div>

                    <!--Danh sách sản phẩm trong đơn hàng-->
                    <div class="tabs-panel" id="panel2">
                        <div class="table-cart-wrap centered">
                            <table class="cart-items-table">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th width="12%">Giá</th>
                                        <th width="10%">Số lượng</th>
                                        <th width="12%">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($list as $bd)

                                    <tr class="cart-item-row">
                                        <td>
                                            <div class="td-img-wrap hide-for-small-only">
                                                <a href="{{ route('detail', ['title' => CateController::getAlias($arr[$bd->id]->cate_id), 'str_book' => get_strBook($arr[$bd->id]->id,$arr[$bd->id]->alias) ]) }}"><img src="upload/products/{{ $arr[$bd->id]->image_before }}"></a>
                                            </div>
                                            <div class="td-name-wrap">
                                                <a href="{ route('detail', ['title' => CateController::getAlias($arr[$bd->id]->cate_id), 'str_book' => get_strBook($arr[$bd->id]->id,$arr[$bd->id]->alias) ]) }}">{{ $arr[$bd->id]->name }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-price-wrap">
                                                <span>{{ number_format($bd->price) }} VNĐ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-quantity-wrap">
                                              <span>
                                                <input type="number" name="" value="{{ $bd->quantity }}" min="1" disabled>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-total-wrap">
                                            <span>{{ number_format($bill->total_price) }} VNĐ</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach


                                

                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

            </div>
        </div>
        <!--KẾT THÚC DANH SÁCH ĐƠN HÀNG-->
    </div>
</div>
</main>
<!-- END MAIN BILL PAGE -->
@endsection