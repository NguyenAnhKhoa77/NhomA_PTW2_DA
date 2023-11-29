@extends('fontend.black')
@section('title', 'Profile')
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
                                       role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-change-password-link" href="{{ route('change.password') }}"
                                       role="tab" aria-controls="tab-orders" aria-selected="true">Change Password</a>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-account" role="tabpanel"
                                     aria-labelledby="tab-change-password-link">
                                    <form action="{{ route('change.password.process') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @elseif (session('error'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ session('error') }}
                                                </div>
                                            @endif

                                            <div class="mb-3">
                                                <label for="oldPasswordInput" class="form-label">Current
                                                    Password</label>
                                                <input name="current_password" type="password"
                                                       class="form-control @error('current_password') is-invalid @enderror"
                                                       id="currentPasswordInput"
                                                       placeholder="Current Password">
                                                @error('current_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="newPasswordInput" class="form-label">New
                                                    Password</label>
                                                <input name="new_password" type="password"
                                                       class="form-control @error('new_password') is-invalid @enderror"
                                                       id="newPasswordInput"
                                                       placeholder="New Password">
                                                @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirmNewPasswordInput" class="form-label">Confirm
                                                    New Password</label>
                                                <input name="new_password_confirmation" type="password"
                                                       class="form-control" id="confirmNewPasswordInput"
                                                       placeholder="Confirm New Password">
                                                @error('new_password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                                <button class="btn btn-success">Submit</button>
                                        </div>


                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection

@section('content')

@endsection
