@extends('fontend.black')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Thông tin thanh toán</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Họ và tên *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Địa chỉ *</label>
                                <input type="text" class="form-control" required>
                                <label>Số điện thoại *</label>
                                <input type="text" class="form-control" required>

                                <label>Địa chỉ email</label>
                                <input type="email" class="form-control" required>
                                <label>Ghi chú</label>
                                <textarea class="form-control" cols="30" rows="4"
                                    placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td><a href="#">BÁO BA LỖ CHẠY BỘ LEEVY PHẢN QUANG MS87</a></td>
                                                <td>279.000₫</td>
                                            </tr>

                                            <tr>
                                                <td><a href="#">QUẦN CHẠY BỘ NAM ARSUXEO MS04</a></td>
                                                <td>299.000₫</td>
                                            </tr>
                                            <tr class="summary-subtotal">
                                                <td>Thành tiền:</td>
                                                <td>578.000₫</td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr>
                                                <td>Phí vận chuyển:</td>
                                                <td>Miễn phí</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>578.000₫</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Đặt hàng</span>
                                        <span class="btn-hover-text">Tiến hành kiểm tra đơn</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
