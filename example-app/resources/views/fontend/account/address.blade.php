@extends('fontend.black')
@section('title', 'Address')
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
                                    <a class="nav-link active" id="tab-address-link" href="{{ route('address') }}"
                                       role="tab" aria-controls="tab-address" aria-selected="true">Adresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" href="{{ route('orders.pending') }}"
                                       role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
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
                                <div class="tab-pane fade show active" id="tab-address" role="tabpanel"
                                     aria-labelledby="tab-address-link">
                                    <div class="col-md-12 justify-content-center">
                                        <h3>My Addresses</h3>
                                        <div class="card border">
                                            @if (count($addresses) == 0)
                                                <a href="{{ route('add.address') }}" class="btn btn-primary">Add new</a>
                                            @else
                                                @foreach($addresses as $address)
                                                    <div class="card-body border">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h5>{{ $address->fullname }}</h5>
                                                                <p class="card-text">{{ $address->phone }}</p>
                                                                <p class="card-text">{{ $address->street_address }}</p>
                                                                @if ($address->is_default == 1)
                                                                    <span class="card-text border bg-warning p-2">Address default</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-4 pt-5 pb-5 text-center">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-center">
                                                                        <a href="{{ route('change.address', $address->id) }}"
                                                                           class="card-link font-weight-bold">Change</a>
                                                                        <form
                                                                            action="{{ route('delete.address.process', $address->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit"
                                                                                    class="text-danger border-0 bg-transparent">
                                                                                Delete
                                                                            </button>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        @if ($address->is_default == 1)
                                                                            <a href="" class="btn btn-primary disabled">Set
                                                                                as
                                                                                default</a>
                                                                        @else
                                                                            <form
                                                                                action="{{ route('change.address-default.process', $address->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <button
                                                                                    class="btn btn-primary">Set as
                                                                                    default
                                                                                </button>
                                                                            </form>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <a href="{{ route('add.address') }}" class="btn btn-primary">Add new</a>
                                            @endif
                                        </div>
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
