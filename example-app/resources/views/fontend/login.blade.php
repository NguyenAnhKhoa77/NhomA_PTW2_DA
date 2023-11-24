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
        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill">
                            <li class="nav-item">
                                <a class="nav-link active">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('register.view') }}">Đăng ký</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            {{-- login form --}}
                            <div class="tab-pane fade show active">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="singin-email-2">Tài khoản
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                            id="singin-email-2" name="email" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password-2">Mật khẩu
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="singin-password-2" name="password" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Đăng nhập</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                id="signin-remember-2">
                                            <label class="custom-control-label" for="signin-remember-2">Ghi nhớ đăng
                                                nhập</label>
                                        </div><!-- End .custom-checkbox -->
                                        <a href="#" class="forgot-link">Quên mật khẩu?</a>
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
