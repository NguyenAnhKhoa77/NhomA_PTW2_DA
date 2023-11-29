@extends('fontend.black')
@section('title', 'Checkout via Momo')
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
                            <a class="nav-link active" href="{{ route('check-out-momo') }}">Online Payment via Momo</a>
                        </li>
                    </ul>
                    <form action="{{ route('process.check-out-momo') }}" method="post">
                        @csrf
                        <div class="row pt-2">
                            <div class="col-lg-6">
                                <h2 class="checkout-title">Payment Information</h2><!-- End .checkout-title -->
                                <div class="form-group">
                                    <label for="name">Họ và tên *</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="@if($userInfo->name){{ $userInfo->name }}@endif" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone *</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           value="@if($userInfo->phone){{ $userInfo->phone }}@endif" required>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="address">Address *</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                           value="@if($userInfo->address){{ $userInfo->address }}@endif" required>
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <input type="hidden" name="user_id" value="{{ session('user_id') }}">
                                <input type="hidden" name="shipping" value="{{ $totalShippingFees }}">
                                <input type="hidden" name="total" value="{{ $totalPrices }}">
                                <input type="hidden" name="payment_type" value="1">
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
