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
                                    <a class="nav-link active" id="tab-dashboard-link"
                                       href="{{ route('profile') }}" role="tab" aria-controls="tab-dashboard"
                                       aria-selected="true">Account Details</a>
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
                                    <a class="nav-link" id="tab-change-password-link"
                                       href="{{ route('change.password') }}"
                                       role="tab" aria-controls="tab-change-password" aria-selected="false">Change
                                        Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-mail-box-link"
                                       href="{{ route('mailbox') }}"
                                       role="tab" aria-controls="tab-change-password" aria-selected="false">Mailbox</a>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-account" role="tabpanel"
                                     aria-labelledby="tab-account-link">
                                    <form action=" {{ route('update.profile', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{ $userInfo->name }}" required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone Number *</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $userInfo->phone }}" required>
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address *</label>
                                            <input type="text" class="form-control" name="address" value="{{ $userInfo->address }}" required>
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Avatar</label>
                                            <div class="img-box">
                                                <img src="{{ asset("backend/img/". $userInfo->avatar) }}"
                                                     style="width: 300px;height: 300px" alt="">
                                                <a href="#avatar"> <i class="far fa-edit action-overlay"></i><label for="avatar">Change
                                                        Profile Image</label> </a>
                                                <input type="file" id="avatar" name="avatar" hidden>
                                                @if ($errors->has('avatar'))
                                                    <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SAVE CHANGES</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
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
