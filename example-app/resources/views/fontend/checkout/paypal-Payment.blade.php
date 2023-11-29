@extends('fontend.black')
@section('title', 'Payment Paypal')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('check-out') }}">Cash On Delivery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('check-out-momo') }}">Online Payment via Momo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('check-out-paypal') }}">Paypal</a>
                        </li>
                    </ul>
                    <form action="{{ route('payment') }}" method="post">
                        @csrf
                        <div class="row pt-2">
                            
                            </div><!-- End .col-lg-6 -->
                            <aside class="col-lg-6">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th>Prices</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($checkOutProducts as $checkOutProduct)
                                            <tr>
                                                <td><a href="#">{{ $checkOutProduct->name }}</a></td>
                                                <td>{{ number_format($checkOutProduct->price) }} VNĐ</td>
                                            </tr>
                                        @endforeach
                                        <tr class="summary-subtotal">
                                            <td>Sub Total:</td>
                                            <td>{{ number_format($subTotalPrices) }} VNĐ</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping Fee:</td>
                                            <td>{{ number_format($totalShippingFees) }} VNĐ</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>{{ number_format($totalPrices) }} VNĐ</td>
                                        </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->
                                    <button type="submit" name="payUrl"
                                            class="btn btn-success btn-outline-primary-2 btn-order btn-block">Checkout
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-6 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection