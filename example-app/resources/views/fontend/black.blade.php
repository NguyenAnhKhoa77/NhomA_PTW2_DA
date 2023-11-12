<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shop - @yield('title')</title>
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="fontend/css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="fontend/css/style.css">
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-intro-clearance">
            <div class="header-top">
                <div class="container">
                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <ul>
                                    <li><a href="">Đăng nhập / Đăng ký</a></li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="index.html" class="logo">
                            Nhóm A
                        </a>
                    </div><!-- End .header-left -->
                    <div class="header-center">
                        <div
                            class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Tìn kiếm</label>
                                    <input type="search" class="form-control" name="q" id="q"
                                        placeholder="Search product ..." required>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>
                    <div class="header-right">
                        <div class="account">
                            <a href="dashboard.html" title="My account">
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                                <p>Tài khoản</p>
                            </a>
                        </div><!-- End .compare-dropdown -->

                        <div class="wishlist">
                            <a href="wishlist.html" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count badge">3</span>
                                </div>
                                <p>Wishlist</p>
                            </a>
                        </div><!-- End .compare-dropdown -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">2</span>
                                </div>
                                <p>Giỏ hàng</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">ÁO BA LỖ CHẠY BỘ LEEVY PHẢN QUANG MS87</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                x 279.000₫
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="fontend/images/products/ao-ba-lo.jpg" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i
                                                class="icon-close"></i></a>
                                    </div><!-- End .product -->

                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">QUẦN CHẠY BỘ NAM ARSUXEO MS04 - 2 LỚP (BOXER) -
                                                    THIẾT KẾ 4 TÚI ĐA NĂNG</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                x 299.000₫
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="fontend/images/products/quan-chay-bo.jpg" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i
                                                class="icon-close"></i></a>
                                    </div><!-- End .product -->
                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Tổng</span>
                                    <span class="cart-total-price">578.000₫</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="cart.html" class="btn btn-primary">Xem giỏ hàng</a>
                                    <a href="checkout.html" class="btn btn-outline-primary-2">
                                        <span>Thanh toán</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
            <div class="sticky-wrapper">
                <div class="header-bottom sticky-header">
                    <div class="container">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="active">
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="category.html">Đồ thể thao nam</a>
                                    <div class="megamenu megamenu-md">
                                        <div class="menu-col">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="">Áo thể thao nam</a></li>
                                                        <li><a href="">Quần thể thao nam</a></li>
                                                        <li><a href="">Bộ thể thao nam</a></li>
                                                        <li><a href="">Phụ kiện thể thao nam</a></li>
                                                    </ul>
                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .megamenu megamenu-md -->
                                </li>
                                <li>
                                    <a href="category.html">Đồ thể thao nữ</a>
                                    <div class="megamenu megamenu-md">
                                        <div class="menu-col">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="">Áo thể thao nữ</a></li>
                                                        <li><a href="">Quần thể thao nữ</a></li>
                                                        <li><a href="">Bộ thể thao nữ</a></li>
                                                        <li><a href="">Phụ kiện thể thao nữ</a></li>
                                                    </ul>
                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .megamenu megamenu-md -->
                                </li>
                                <li>
                                    <a href="category.html">Phụ kiện thể thao</a>
                                    <div class="megamenu megamenu-md">
                                        <div class="menu-col">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="">ABC</a></li>
                                                    </ul>
                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .megamenu megamenu-md -->
                                </li>
                                <li class="">
                                    <a href="">Quần áo nhóm</a>
                                </li>

                                <li class="">
                                    <a href="">Tin tức</a>
                                </li>

                                <li class="">
                                    <a href="">Liên hệ</a>
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
                <div class="" style="width: 271.857px;">
                    <a href="#" class="brand">
                        <img class="" src="{{ url('fontend/images/category/adidas.png', []) }}">
                    </a>
                </div>
                <div class="" style="width: 271.857px;">
                    <a href="#" class="brand">
                        <img class="" src="{{ url('fontend/images/category/hitec.png', []) }}">
                    </a>
                </div>
                <div class="" style="width: 271.857px;">
                    <a href="#" class="brand">
                        <img class="" src="{{ url('fontend/images/category/nike.png', []) }}">
                    </a>
                </div>
                <div class="" style="width: 271.857px;">
                    <a href="#" class="brand">
                        <img class="" src="{{ url('fontend/images/category/newbalance.png', []) }}">
                    </a>
                </div>
                <div class="" style="width: 271.857px;">
                    <a href="#" class="brand">
                        <img class="" src="{{ url('fontend/images/category/puma.png', []) }}">
                    </a>
                </div>
                <div class="" style="width: 271.857px;">
                    <a href="#" class="brand">
                        <img class="" src="{{ url('fontend/images/category/underarmour.png', []) }}">
                    </a>
                </div>
            </div>
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-2">
                            <div class="widget widget-about">
                                <a href="index.html" class="logo-footer">
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
                                    <li><a href="cart.html">Giỏ hàng</a></li>
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
    <script src="{{ url('fontend/js/bootstrap.bundle.min.js', []) }}"></script>
    <script src="{{ url('fontend/js/jquery.min.js', []) }}"></script>

    <script src="fontend/js/jquery.hoverIntent.min.js"></script>
    <script src="fontend/js/jquery.waypoints.min.js"></script>
    <script src="fontend/js/superfish.min.js"></script>
    <script src="fontend/js/owl.carousel.min.js"></script>
    <script src="fontend/js/jquery.plugin.min.js"></script>
    <script src="fontend/js/jquery.magnific-popup.min.js"></script>
    <script src="fontend/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="{{ url('fontend/js/main.js', []) }}"></script>
</body>

</html>
