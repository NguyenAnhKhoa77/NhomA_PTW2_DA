@extends('fontend.black')
@section('title', 'Orders')
@section('content')
<main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">My Account<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-dashboard-link"
                                       href="{{ route('profile') }}" role="tab" aria-controls="tab-dashboard"
                                       aria-selected="false">Account Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-address-link" href="{{ route('address') }}"
                                       role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" href="{{ route('orders.pending') }}"
                                       role="tab" aria-controls="tab-orders" aria-selected="true">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-change-password-link" href="{{ route('change.password') }}"
                                       role="tab" aria-controls="tab-change-password" aria-selected="false">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-mail-box-link"
                                       href="{{ route('mailbox') }}"
                                       role="tab" aria-controls="tab-change-password" aria-selected="false">Mailbox</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-user-coupon-link"
                                       href="{{ route('coupon') }}"
                                       role="tab" aria-controls="tab-change-password" aria-selected="false">Coupon</a>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-user-coupon" role="tabpanel"
                                     aria-labelledby="tab-user-coupon-link">
                                     <!-- Coupon của người dùng có id tương ứng với trên coupon -->
                                     <h1>Các phiếu giảm giá bạn đang có</h1>
                                     <div class="d-flex flex-column">
                                     @foreach($userncoupon as $key)
                                        @if($key->user_id === session('user_id'))
                                            @foreach($coupons as $value)
                                                @if($value->id === $key->coupon_id)
                                                    <p>{{$value->code}}</p>
                                                @endif
                                             @endforeach
                                        @endif
                                     @endforeach
                                     </div>
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection