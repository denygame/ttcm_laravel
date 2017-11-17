@extends('master')
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
                    <li><a href="">Thông tin cá nhân</a></li>
                    <li><a href="">Đơn hàng</a></li>
                    <li><a href="">Thông báo</a></li>
                </ul>
            </div>
        </div>
        <!-- MAIN CONTENT -->
        <div class="small-12 medium-12 large-9 columns content-wrap">
            <div class="row content-wrap-head">
                <span class="content-wrap-title float-left">Đơn hàng chi tiết</span>
            </div>

            <!--NẾU CHƯA CÓ ĐƠN HÀNG NÀO-->
            <div class="none-bill" style="display: none">
                <h3>Bạn chưa có đơn hàng nào.</h3>
                <br>
                <a href=""><i class="fa fa-hand-o-right"></i> Hãy về trang chủ để mua hàng nào !!!</a>
            </div>
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
                                <input type="text" value="HD01" disabled>
                            </div>
                            <div>
                                <label for="">Ngày đặt hàng:</label>
                                <input type="text" value="9/10/2017" disabled>
                            </div>
                            <div>
                                <label for="">Giá trị đơn hàng:</label>
                                <input type="text" value="800.000đ" disabled>
                            </div>
                            <div>
                                <label for="">Tên người nhận:</label>
                                <input type="text" value="Nguyễn văn a" disabled>
                            </div>
                            <div>
                                <label for="">Địa chỉ giao hàng:</label>
                                <input type="text" value="123 ..." disabled>
                            </div>
                            <div>
                                <label for="">Hình thức giao hàng:</label>
                                <input type="text" value="Nguyễn văn a" disabled>
                            </div>
                            <div>
                                <label for="">Hình thức thanh toán:</label>
                                <input type="text" value="Nguyễn văn a" disabled>
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
                                <tr class="cart-item-row">
                                    <td>
                                        <div class="td-img-wrap hide-for-small-only">
                                            <img src="img/product/book.jpg">
                                        </div>
                                        <div class="td-name-wrap">
                                            <a href="">Product name</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-price-wrap">
                                            <span>80.00$</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-quantity-wrap">
                                          <span>
                                            <input type="number" name="" value="3" min="1">
                                          </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-total-wrap">
                                            <span>400.00$</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="cart-item-row">
                                    <td>
                                        <div class="td-img-wrap hide-for-small-only">
                                            <img src="img/product/book.jpg">
                                        </div>
                                        <div class="td-name-wrap">
                                            <a href="">Product name</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-price-wrap">
                                            <span>80.00$</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-quantity-wrap">
                                          <span>
                                            <input type="number" name="" value="3" min="1">
                                          </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-total-wrap">
                                            <span>400.00$</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="cart-item-row">
                                    <td>
                                        <div class="td-img-wrap hide-for-small-only">
                                            <img src="img/product/book.jpg">
                                        </div>
                                        <div class="td-name-wrap">
                                            <a href="">Product name</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-price-wrap">
                                            <span>80.00$</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-quantity-wrap">
                                          <span>
                                            <input type="number" name="" value="3" min="1">
                                          </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-total-wrap">
                                            <span>400.00$</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="cart-item-row">
                                    <td>
                                        <div class="td-img-wrap hide-for-small-only">
                                            <img src="img/product/book.jpg">
                                        </div>
                                        <div class="td-name-wrap">
                                            <a href="">Product name</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-price-wrap">
                                            <span>80.00$</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-quantity-wrap">
                                          <span>
                                            <input type="number" name="" value="3" min="1">
                                          </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-total-wrap">
                                            <span>400.00$</span>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--KẾT THÚC DANH SÁCH ĐƠN HÀNG-->
        </div>
    </div>
</main>
<!-- END MAIN BILL PAGE -->
@endsection