@php
    use App\Models\User;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop - @yield('title')</title>
    <link rel="icon" href="{{ url('images/team/logo.png', []) }}">
    <!-- Plugins CSS File -->

    <link rel="stylesheet" href="{{ asset('fontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('fontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('fontend/css/jquery.countdown.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('fontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontend/css/skin-demo-2.css') }}">
    <link rel="stylesheet" href="{{ asset('fontend/css/demo-2.css') }}">
    <link rel="stylesheet" href="{{ asset('fontend/css/nouislider.css') }}">
</head>

<body>
    <div class="alert notification d-flex justify-content-center align-items-center m-0 position-relative">
        <div class="success w-50" style="position: absolute;top: 0;">
            @if (Session::has('success'))
                <div id="success-notification" class="alert alert-success alert-dismissible fade show d-flex"
                    role="alert" style="z-index: 999999;">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4.38462C7.79374 4.38462 4.38462 7.79374 4.38462 12C4.38462 16.2063 7.79374 19.6154 12 19.6154C16.2063 19.6154 19.6154 16.2063 19.6154 12C19.6154 7.79374 16.2063 4.38462 12 4.38462ZM3 12C3 7.02903 7.02903 3 12 3C16.971 3 21 7.02903 21 12C21 16.971 16.971 21 12 21C7.02903 21 3 16.971 3 12Z"
                                fill="#ffff" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16.1818 9.66432C16.4522 9.93468 16.4522 10.373 16.1818 10.6434L11.5664 15.2588C11.2961 15.5291 10.8577 15.5291 10.5874 15.2588L7.81813 12.4895C7.54777 12.2192 7.54777 11.7808 7.81813 11.5105C8.08849 11.2401 8.52684 11.2401 8.7972 11.5105L11.0769 13.7902L15.2027 9.66432C15.4731 9.39396 15.9115 9.39396 16.1818 9.66432Z"
                                fill="#ffff" />
                        </svg>
                    </div>
                    <div class="message pl-3">
                        {{ Session::get('success') }}
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="d-flex" aria-hidden="true"><svg width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 18L6 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M18 6L6 18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                </div>
            @endif
        </div>
        <div class="danger w-50" style="position: absolute;top: 0;">
            @if (Session::has('error'))
                <div id="error-notification" class="alert d-flex alert-danger alert-dismissible fade show m-0"
                    role="alert" style="z-index: 999999;">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4.38462C7.79374 4.38462 4.38462 7.79374 4.38462 12C4.38462 16.2063 7.79374 19.6154 12 19.6154C16.2063 19.6154 19.6154 16.2063 19.6154 12C19.6154 7.79374 16.2063 4.38462 12 4.38462ZM12 21C7.02903 21 3 16.971 3 12C3 7.02903 7.02903 3 12 3C16.971 3 21 7.02903 21 12C21 16.971 16.971 21 12 21Z"
                                fill="#ffff" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 7.15384C12.3824 7.15384 12.6923 7.4638 12.6923 7.84615V12.4615C12.6923 12.8439 12.3824 13.1538 12 13.1538C11.6177 13.1538 11.3077 12.8439 11.3077 12.4615V7.84615C11.3077 7.4638 11.6177 7.15384 12 7.15384Z"
                                fill="#ffff" />
                            <circle cx="12" cy="15.6923" r="0.923077" fill="#ffff" />
                        </svg>
                    </div>
                    <div class="message pl-3">
                        {{ Session::get('error') }}
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="d-flex" aria-hidden="true"><svg width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 18L6 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M18 6L6 18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                </div>
            @endif
        </div>
        <div class="warning w-50" style="position: absolute;top: 0px;">
            @if (Session::has('warning'))
                <div id="error-notification" class="alert d-flex alert-warning alert-dismissible fade show m-0"
                    role="alert" style="z-index: 999999;">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4.38462C7.79374 4.38462 4.38462 7.79374 4.38462 12C4.38462 16.2063 7.79374 19.6154 12 19.6154C16.2063 19.6154 19.6154 16.2063 19.6154 12C19.6154 7.79374 16.2063 4.38462 12 4.38462ZM12 21C7.02903 21 3 16.971 3 12C3 7.02903 7.02903 3 12 3C16.971 3 21 7.02903 21 12C21 16.971 16.971 21 12 21Z"
                                fill="#ffff" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 7.15384C12.3824 7.15384 12.6923 7.4638 12.6923 7.84615V12.4615C12.6923 12.8439 12.3824 13.1538 12 13.1538C11.6177 13.1538 11.3077 12.8439 11.3077 12.4615V7.84615C11.3077 7.4638 11.6177 7.15384 12 7.15384Z"
                                fill="#ffff" />
                            <circle cx="12" cy="15.6923" r="0.923077" fill="#ffff" />
                        </svg>
                    </div>
                    <div class="message pl-3">
                        {{ Session::get('warning') }}
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="d-flex" aria-hidden="true"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 18L6 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M18 6L6 18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <div class="page-wrapper">
        <header class="header header-intro-clearance">
            <div class="header-top">
                <div class="container">
                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <ul>
                                    @if (Auth::check())
                                        @if (Auth::user()->is_admin)
                                            <li><a href="{{ route('dashboard') }}">ADMIN</a></li>
                                        @endif
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                <button type="submit">Logout</button>
                                            </form>

                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        </li>
                                    @else
                                        <li><a href="{{ route('login.view') }}">Đăng nhập / Đăng ký</a></li>
                                    @endif
                                </ul>

                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="{{ route('home') }}" class="logo">
                            Nhóm A
                        </a>
                    </div><!-- End .header-left -->
                    <div class="header-center">
                        <div
                            class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="{{ route('grid') }}" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Tìn kiếm</label>
                                    <input type="search" class="form-control" name="name"
                                        value="{{ session('search_keyword') }}" placeholder="Search product ...">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>

                        </div><!-- End .header-search -->
                    </div>
                    <div class="header-right">
                        @auth
                            <div class="account">
                                <a href="{{ route('profile') }}" title="My account">
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <p>Account</p>
                                </a>
                            </div><!-- End .compare-dropdown -->

                            <div class="wishlist">
                                <a href="{{ route('wishlist') }}" title="Wishlist">
                                    <div class="icon">
                                        <i class="icon-heart-o"></i>
                                        <span class="wishlist-count badge">@php
                                            $userId = session('user_id');
                                            $user = User::with('wishlistProducts')->find($userId);
                                            $wishlistProducts = $user->wishlistProducts;
                                            echo count($wishlistProducts);
                                        @endphp</span>
                                    </div>
                                    <p>Wishlist</p>
                                </a>
                            </div><!-- End .compare-dropdown -->
                        @endauth

                        <div class="dropdown cart-dropdown">
                            <a href="{{ route('cart', []) }}" class="dropdown-toggle">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    @php
                                        $cart = session('cart', []);
                                        $totalQuantity = 0;
                                    @endphp

                                    @foreach ($cart as $cartItem)
                                        @php
                                            $totalQuantity += $cartItem['quantity'];
                                        @endphp
                                    @endforeach
                                    <span class="cart-count">{{ $totalQuantity }}</span>
                                </div>
                                <p>Cart</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @php
                                        $cart = session('cart', []);
                                        $totalQuantity = 0;
                                    @endphp

                                    @foreach ($cart as $cartItem)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a
                                                        href="{{ route('detail', encrypt($cartItem['id'])) }}">{{ $cartItem['name'] }}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{ $cartItem['quantity'] }}</span>
                                                    x {{ number_format($cartItem['price']) }}
                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="{{ route('detail', encrypt($cartItem['id'])) }}"
                                                    class="product-image">
                                                    <img src="{{ asset('images/products/' . $cartItem['image']) }}"
                                                        alt="product">
                                                </a>
                                            </figure>
                                            <form
                                                action="{{ route('cart.remove', ['productId' => $cartItem['id']]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-remove">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </form>
                                        </div><!-- End .product -->
                                    @endforeach
                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total</span>
                                    @php
                                        $cart = session('cart', []);
                                        $totalPrice = 0;
                                    @endphp

                                    @foreach ($cart as $cartItem)
                                        @php
                                            $price = $cartItem['quantity'] * $cartItem['price'];
                                            $totalPrice += $price;
                                        @endphp
                                    @endforeach
                                    <span class="cart-total-price">{{ number_format($totalPrice) }}</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="{{ route('cart', []) }}" class="btn btn-primary">View Cart</a>
                                    <a href="{{ route('check-out', []) }}"
                                        class="btn btn-outline-primary-2"><span>Checkout</span><i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
            <div class="sticky-wrapper">
                <div class="header-bottom sticky-header">
                    <div class="container">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                                    <a href="{{ route('home', []) }}">Home</a>
                                <li class="">
                                    <a href="{{ route('grid', []) }}">Grid</a>
                                </li>
                                <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                                    <a href="{{ route('contact', []) }}">Liên hệ</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .container -->
                </div>
            </div>
        </header><!-- End .header -->

        @yield('content')


        <div class="mb-5"></div><!-- End .mb-5 -->
        <footer class="footer">
            <div class="icon-boxes-container">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-lg-4">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Miễn phí vận chuyển</h3><!-- End .icon-box-title -->
                                    <p>Áp dụng cho đơn hàng từ 50.000 VND</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-4">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Hoàn tiền trả hàng</h3><!-- End .icon-box-title -->
                                    <p>Trong vòng 7 ngày.</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Hỗ trợ tận tình</h3><!-- End .icon-box-title -->
                                    <p>24 giờ/7 ngày</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div>
            <div class="brands-border">
                @foreach ($manufacturer as $item)
                    <div class="" style="width: 271.857px;">
                        <a href="#" class="brand">
                            <img class="" src="{{ asset('images/manufacturers/' . $item->image) }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-2">
                            <div class="widget widget-about">
                                <a href="index" class="logo-footer">
                                    Nhóm A
                                </a>
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-12 col-lg-3 -->

                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">Thông tin liên hệ</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="">0912345678</a></li>
                                    <li><a href="">53 Võ Văn Ngân, Linh Chiểu, Thủ Đức</a></li>

                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-3 -->
                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">Tài khoản</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Đăng nhập</a></li>
                                    <li><a href="cart">Giỏ hàng</a></li>
                                    <li><a href="#">My Wishlist</a></li>
                                    <li><a href="#">Kiểm tra đơn hàng</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-64 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © 2023 NHÓM A - TDC</p>
                    <!-- End .footer-copyright -->

                    <div class="social-icons social-icons-color">
                        <span class="social-label">Social Media</span>
                        <a href="#" class="social-icon social-facebook" title="Facebook"><i
                                class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon social-twitter" title="Twitter"><i
                                class="icon-twitter"></i></a>
                        <a href="#" class="social-icon social-instagram" title="Instagram"><i
                                class="icon-instagram"></i></a>
                        <a href="#" class="social-icon social-youtube" title="Youtube"><i
                                class="icon-youtube"></i></a>
                        <a href="#" class="social-icon social-pinterest" title="Pinterest"><i
                                class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
    <!-- Plugins JS File -->
    <!-- Plugins JS File -->
    <script src="{{ asset('fontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('fontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fontend/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('fontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('fontend/js/superfish.min.js') }}"></script>
    <script src="{{ asset('fontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('fontend/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('fontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('fontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('fontend/js/jquery.elevateZoom.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('fontend/js/main.js') }}"></script>
    <script src="{{ asset('fontend/js/demo-2.js') }}"></script>
</body>

</html>
