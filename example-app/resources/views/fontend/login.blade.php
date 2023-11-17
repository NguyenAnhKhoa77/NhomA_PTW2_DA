@extends('fontend.black')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>

                {{ session('success') }}
            </div>
        @endif
        @if (session('errors'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                {{ session('errors') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i>Warning!</h5>
                {{ session('warning') }}
            </div>
        @endif
        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
            style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2"
                                    role="tab" aria-controls="signin-2" aria-selected="true">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="register-tab-2" data-toggle="tab" href="#register-2" role="tab"
                                    aria-controls="register-2" aria-selected="false">Đăng ký</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            {{-- login form --}}
                            <div class="tab-pane fade show active" id="signin-2" role="tabpanel"
                                aria-labelledby="signin-tab-2">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="singin-email-2">Tài khoản
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="singin-email-2" name="email"
                                            required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password-2">Mật khẩu
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="singin-password-2" name="password"
                                            required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Đăng nhập</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                            <label class="custom-control-label" for="signin-remember-2">Ghi nhớ đăng
                                                nhập</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="#" class="forgot-link">Quên mật khẩu?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->

                            {{-- register form --}}
                            <div class="tab-pane fade " id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="register-email-2">Địa chỉ email
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="email" class="form-control" id="register-email" name="email"
                                            required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password-2">Mật khẩu
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="register-password"
                                            name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password-2">Xác nhận mật khẩu
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="register-password-confirmation"
                                            name="password_confirmation" required>
                                    </div><!-- End .form-group -->

                                    {{-- <div class="form-group">
                                        <label for="register-password-2">Tên người dùng
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="register-name" name="name"
                                            required>
                                    </div> --}}
                                    <!-- End .form-group -->
                                    {{-- <div class="form-group">
                                        <label for="register-password-2">Số điện thoại
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="register-phone" name="phone"
                                            required>
                                    </div> --}}
                                    <!-- End .form-group -->
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Đăng ký</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        {{-- <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy-2"
                                                required>
                                            <label class="custom-control-label" for="register-policy-2">Tôi đồng ý với <a
                                                    href="">chính sách bảo mật</a> <span
                                                    style="color: red">*</span></label>
                                        </div><!-- End .custom-checkbox --> --}}

                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
@endsection
