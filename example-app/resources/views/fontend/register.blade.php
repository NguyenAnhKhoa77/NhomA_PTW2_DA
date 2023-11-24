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
                                <a class="nav-link " href=" {{ route('login.view', []) }} ">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active">Đăng ký</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            {{-- register form --}}
                            <div class="tab-pane fade show active">
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
                                        <input type="password" class="form-control" id="register-password" name="password"
                                            required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password-2">Xác nhận mật khẩu
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="register-password-confirmation"
                                            name="password_confirmation" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Đăng ký</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </div><!-- End .form-footer -->

                                </form>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->















                </d iv><!-- End .container -->
            </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
@endsection
