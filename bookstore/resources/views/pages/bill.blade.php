@extends('master')
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
                    <li><a href="">Thông tin cá nhân</a></li>
                    <li><a href="">Đơn hàng</a></li>
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

            <!--NẾU CHƯA CÓ ĐƠN HÀNG NÀO-->
            <div class="none-bill" style="display: none">
                <h3>Bạn chưa có đơn hàng nào.</h3>
                <br>
                <a href=""><i class="fa fa-hand-o-right"></i> Hãy về trang chủ để mua hàng nào !!!</a>
            </div>
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
                    <tr class="cart-item-row">
                        <td>
                            <div class="td-id-bill">
                                <span>HD01</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-date-bill">
                                <span>9/10/2017</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-total-bill">
                                <span>80.00$</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-status-bill">
                                <span>Đã nhận</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-info-bill">
                                <span><a href="">Chi tiết</a></span>
                            </div>
                        </td>
                        <td>
                            <div class="td-del-wrap">
                                <i class="fa fa-times-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr class="cart-item-row">
                        <td>
                            <div class="td-id-bill">
                                <span>HD01</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-date-bill">
                                <span>9/10/2017</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-total-bill">
                                <span>80.00$</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-status-bill">
                                <span>Đã nhận</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-info-bill">
                                <span><a href="">Chi tiết</a></span>
                            </div>
                        </td>
                        <td>
                            <div class="td-del-wrap">
                                <i class="fa fa-times-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr class="cart-item-row">
                        <td>
                            <div class="td-id-bill">
                                <span>HD01</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-date-bill">
                                <span>9/10/2017</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-total-bill">
                                <span>80.00$</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-status-bill">
                                <span>Đã nhận</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-info-bill">
                                <span><a href="">Chi tiết</a></span>
                            </div>
                        </td>
                        <td>
                            <div class="td-del-wrap">
                                <i class="fa fa-times-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr class="cart-item-row">
                        <td>
                            <div class="td-id-bill">
                                <span>HD01</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-date-bill">
                                <span>9/10/2017</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-total-bill">
                                <span>80.00$</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-status-bill">
                                <span>Đã nhận</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-info-bill">
                                <span><a href="">Chi tiết</a></span>
                            </div>
                        </td>
                        <td>
                            <div class="td-del-wrap">
                                <i class="fa fa-times-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr class="cart-item-row">
                        <td>
                            <div class="td-id-bill">
                                <span>HD01</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-date-bill">
                                <span>9/10/2017</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-total-bill">
                                <span>80.00$</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-status-bill">
                                <span>Đã nhận</span>
                            </div>
                        </td>
                        <td>
                            <div class="td-info-bill">
                                <span><a href="">Chi tiết</a></span>
                            </div>
                        </td>
                        <td>
                            <div class="td-del-wrap">
                                <i class="fa fa-times-circle"></i>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!--Phân trang-->
                <div>
                    <ul class="pagination modal-3 float-right">
                        <li><a href="#" class="prev">&laquo</a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li> <a href="#">2</a></li>
                        <li> <a href="#">3</a></li>
                        <li> <a href="#">4</a></li>
                        <li> <a href="#">5</a></li>
                        <li><a href="#" class="next">&raquo;</a></li>
                    </ul>
                </div>
                <!--End phân trang-->
            </div>
            <!--KẾT THÚC DANH SÁCH ĐƠN HÀNG-->
        </div>
    </div>
</main>
<!-- END MAIN BILL PAGE -->
@endsection