@extends('fontend.black')
@section('title', 'Orders Cancelled')
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
                                <div class="tab-pane fade show active" id="tab-orders" role="tabpanel">
                                    <!-- Tabs navs -->
                                    <ul class="nav nav-tabs nav-justified mb-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('orders.pending') }}">Pending</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('orders.delivering') }}">Delivering</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('orders.delivered') }}">Delivered</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('orders.completed') }}">Completed</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active"
                                               href="{{ route('orders.cancelled') }}">Cancelled</a>
                                        </li>
                                    </ul>
                                    <!-- Tabs navs -->

                                    <!-- Tabs content -->
                                    <div class="tab-content">
                                        @foreach($ordersCancelled as $orderCancelled)
                                            <div class="row d-flex justify-content-center align-items-center border">
                                                <div class="col-md-12">
                                                    <div class="card card-stepper mt-1 mb-1">
                                                        <div class="card-header p-4 border">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <p class="text-muted">Tracking Status:
                                                                        <span
                                                                            class="text-body">{{ $orderCancelled->status }}</span>
                                                                    </p>
                                                                    <h4 class="mt-3 mb-3">
                                                                        Total: {{ number_format($orderCancelled->total) }}
                                                                        VNĐ<span
                                                                            class="small text-muted"> via @if($orderCancelled->payment_type == 0)
                                                                                Cash On Delivery
                                                                            @else
                                                                                Online Payment with Momo
                                                                            @endif</span>
                                                                    </h4>
                                                                </div>
                                                                <div>
                                                                    <form
                                                                        action="{{ route('orders.detail', $orderCancelled->id) }}"
                                                                        method="get">
                                                                        <button type="submit"
                                                                                class="btn btn-outline-info border-0">
                                                                            View Details
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body border p-4">
                                                            @php
                                                                $orders = \App\Models\Orders::where('bill_id', $orderCancelled->id)->get();
                                                            @endphp
                                                            @foreach($orders as $order)
                                                                @php
                                                                    $product = \App\Models\Product::where('id', $order->product_id)->get();
                                                                @endphp
                                                                <div class="d-flex flex-row mb-4 pb-2">
                                                                    <div>
                                                                        <img class="align-self-center img-fluid"
                                                                             src="{{ asset("/images/products/" . $product[0]->image) }}"
                                                                             width="160">
                                                                    </div>
                                                                    <div class="flex-fill ml-5">
                                                                        <h5 class="bold">{{ $product[0]->name }}</h5>
                                                                        <p class="text-muted">
                                                                            Quantity: {{ $order->quantity }}</p>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="card-footer p-4">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="border-start h-100"></div>
                                                                <form action="{{ route('orders.pre-pay.status', $orderCancelled->id) }}" method="post">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-info">Pre-pay</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
