@extends('fontend.black')
@section('title', 'Order Detail')
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
                                    <a class="nav-link active" id="tab-orders-link" href="{{ route('orders.pending') }}"
                                       role="tab" aria-controls="tab-orders" aria-selected="true">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-change-password-link"
                                       href="{{ route('change.password') }}"
                                       role="tab" aria-controls="tab-change-password" aria-selected="false">Change
                                        Password</a>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <!-- Tabs content -->
                                @php
                                    $orders = \App\Models\Orders::where('bill_id', $billCurrent->id)->get();
                                @endphp
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header px-4 py-5">
                                                <h5 class="text-muted mb-0">Your Order</h5>
                                            </div>
                                            <div class="card-body p-4">
                                                <div class="d-flex justify-content-between align-items-center mb-4">
                                                    <p class="lead fw-normal mb-0" style="color: #a8729a;">Product
                                                        List</p>
                                                    <div class="row d-flex align-items-center">
                                                        <div class="col-md-12">
                                                            <p class="small text-muted mb-0">Receipt Voucher :
                                                                1KAU9-84UIL</p>
                                                            <p class="text-muted mb-0 small">Track
                                                                Order: {{ $billCurrent->status }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="card shadow-0 border mb-4">
                                                    <div class="card-body">
                                                        @foreach($orders as $order)
                                                            @php
                                                                $product = \App\Models\Product::where('id', $order->product_id)->get();
                                                            @endphp
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <img
                                                                        src="{{ asset("/images/products/" . $product[0]->image) }}"
                                                                        class="img-fluid" alt="Phone" width="160">
                                                                </div>
                                                                <div
                                                                    class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                                    <p class="text-muted mb-0">{{ $product[0]->name }}</p>
                                                                </div>
                                                                <div
                                                                    class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                                    <p class="text-muted mb-0 small">
                                                                        Qty: {{ $order->quantity }}</p>
                                                                </div>
                                                                <div
                                                                    class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                                    <p class="text-muted mb-0 small">{{ number_format($order->quantity * $product[0]->price) }}
                                                                        VNĐ</p>
                                                                </div>
                                                            </div>
                                                            @if(!$loop->last)
                                                                <hr class="mb-4"
                                                                    style="background-color: #e0e0e0; opacity: 1;">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <h5 class="text-muted mb-0">Order Details</h5>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-bold mb-0">Phone: </p>
                                                    <p class="text-muted mb-0">{{ $billCurrent->phone }}</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-bold mb-0">Address: </p>
                                                    <p class="text-muted mb-0">{{ $billCurrent->address }}</p>
                                                </div>
                                                <div class="d-flex justify-content-between pt-2">
                                                    <p class="fw-bold mb-0">Total product prices: </p>
                                                    <p class="text-muted mb-0">{{ number_format($billCurrent->total - $billCurrent->shipping) }}
                                                        đ</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="text-muted mb-0">Shipping fee:</p>
                                                    <p class="text-muted mb-0">{{ number_format($billCurrent->shipping) }}
                                                        đ</p>
                                                </div>
                                                <div class="d-flex justify-content-between mb-5">
                                                    <p class="text-muted mb-0">Vourcher discout : </p>
                                                    <p class="text-muted mb-0"><span class="fw-bold me-4">GST 18%</span>
                                                        123</p>
                                                </div>
                                                <h5 class="d-flex align-items-center justify-content-end text-uppercase mb-0">
                                                    Total pay: <span class="h5 mb-0 ml-2 text-secondary"> {{ number_format($billCurrent->total) }}đ</span>
                                                </h5>
                                            </div>
                                            <div class="card-footer border-0 px-4 py-5">
                                                <div class="d-flex align-items-center justify-content-end mt-0 mb-0">
                                                    <a href="{{ url()->previous() }}"
                                                       class="btn btn-white">Back</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabs content -->
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
