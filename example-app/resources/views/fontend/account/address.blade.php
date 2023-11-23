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
                                    <a class="nav-link" id="tab-orders-link" href="{{ route('orders') }}"
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
                                                <div class="card-body mt-0 mx-5">
                                                    <form class="mb-0">
                                                        <div class="row mb-4">
                                                            <div class="col">
                                                                <div class="form-outline">
                                                                    <input type="text" id="form9Example1" class="form-control input-custom" />
                                                                    <label class="form-label" for="form9Example1">First name</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-outline">
                                                                    <input type="text" id="form9Example2" class="form-control input-custom" />
                                                                    <label class="form-label" for="form9Example2">Last name</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col">
                                                                <div class="form-outline">
                                                                    <input type="text" id="form9Example3" class="form-control input-custom" />
                                                                    <label class="form-label" for="form9Example3">City</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-outline">
                                                                    <input type="text" id="form9Example4" class="form-control input-custom" />
                                                                    <label class="form-label" for="form9Example4">Zip</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col">
                                                                <div class="form-outline">
                                                                    <input type="text" id="form9Example6" class="form-control input-custom" />
                                                                    <label class="form-label" for="form9Example6">Address</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-outline">
                                                                    <input type="email" id="typeEmail" class="form-control input-custom" />
                                                                    <label class="form-label" for="typeEmail">Email</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="float-end ">
                                                            <!-- Submit button -->
                                                            <button type="submit" class="btn btn-primary btn-rounded"
                                                                    style="background-color: #0062CC ;">Place order</button>
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>

{{--                                    <p>The following addresses will be used on the checkout page by default.</p>--}}

{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-6">--}}
{{--                                            <div class="card card-dashboard">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <h3 class="card-title">Billing Address</h3><!-- End .card-title -->--}}

{{--                                                    <p>User Name<br>--}}
{{--                                                        User Company<br>--}}
{{--                                                        John str<br>--}}
{{--                                                        New York, NY 10001<br>--}}
{{--                                                        1-234-987-6543<br>--}}
{{--                                                        yourmail@mail.com<br>--}}
{{--                                                        <a href="#">Edit <i class="icon-edit"></i></a>--}}
{{--                                                    </p>--}}
{{--                                                </div><!-- End .card-body -->--}}
{{--                                            </div><!-- End .card-dashboard -->--}}
{{--                                        </div><!-- End .col-lg-6 -->--}}

{{--                                        <div class="col-lg-6">--}}
{{--                                            <div class="card card-dashboard">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->--}}

{{--                                                    <p>You have not set up this type of address yet.<br>--}}
{{--                                                        <a href="#">Edit <i class="icon-edit"></i></a>--}}
{{--                                                    </p>--}}
{{--                                                </div><!-- End .card-body -->--}}
{{--                                            </div><!-- End .card-dashboard -->--}}
{{--                                        </div><!-- End .col-lg-6 -->--}}
{{--                                    </div><!-- End .row -->--}}
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
