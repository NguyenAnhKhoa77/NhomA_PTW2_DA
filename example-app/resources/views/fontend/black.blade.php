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
                                    <label for="q" class="sr-only">Search</label>
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
                                <p>Account</p>
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
                                <p>Cart</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">Beige knitted elastic runner shoes</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                x $84.00zx
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="fontend/images/products/cart/product-1.jpg" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i
                                                class="icon-close"></i></a>
                                    </div><!-- End .product -->

                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">Blue utility pinafore denim dress</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                x $76.00
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="fontend/images/products/cart/product-2.jpg" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i
                                                class="icon-close"></i></a>
                                    </div><!-- End .product -->
                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total</span>
                                    <span class="cart-total-price">$160.00</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="cart.html" class="btn btn-primary">View Cart</a>
                                    <a href="checkout.html" class="btn btn-outline-primary-2">
                                        <span>Checkout</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static"
                                title="Browse Categories">
                                Categories
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical">
                                        <li><a href="#">Beds</a></li>
                                        <li><a href="#">Lighting</a></li>
                                        <li><a href="#">Sofas & Sleeper sofas</a></li>
                                        <li><a href="#">Storage</a></li>
                                        <li><a href="#">Armchairs & Chaises</a></li>
                                        <li><a href="#">Decoration </a></li>
                                        <li><a href="#">Kitchen Cabinets</a></li>
                                        <li><a href="#">Coffee & Tables</a></li>
                                        <li><a href="#">Outdoor Furniture </a></li>
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="active">
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="category.html">Shop</a>
                                </li>
                                <li>
                                    <a href=""></a>
                                </li>
                                <li>
                                    <a href=""></a>
                                </li>
                                <li>
                                    <a href=""></a>
                                </li>
                                <li>
                                    <a href=""></a>
                                </li>
                                <li>
                                    <a href=""></a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

        @yield('content')

        <div class="brands-border">
            <div class="" style="width: 271.857px;">
                <a href="#" class="brand">
                    <img src="fontend/images/brands/1.png" alt="Brand Name">
                </a>
            </div>
            <div class="" style="width: 271.857px;">
                <a href="#" class="brand">
                    <img src="fontend/images/brands/2.png" alt="Brand Name">
                </a>
            </div>
            <div class="" style="width: 271.857px;">
                <a href="#" class="brand">
                    <img src="fontend/images/brands/3.png" alt="Brand Name">
                </a>
            </div>
            <div class="" style="width: 271.857px;">
                <a href="#" class="brand">
                    <img src="fontend/images/brands/4.png" alt="Brand Name">
                </a>
            </div>
            <div class="" style="width: 271.857px;">
                <a href="#" class="brand">
                    <img src="fontend/images/brands/5.png" alt="Brand Name">
                </a>
            </div>
            <div class="" style="width: 271.857px;">
                <a href="#" class="brand">
                    <img src="fontend/images/brands/6.png" alt="Brand Name">
                </a>
            </div>
            <div class="" style="width: 271.857px;">
                <a href="#" class="brand">
                    <img src="fontend/images/brands/7.png" alt="Brand Name">
                </a>
            </div>
        </div>
        <footer class="footer">
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
    <script src="fontend/js/jquery.min.js"></script>
    <script src="fontend/js/bootstrap.bundle.min.js"></script>
    <!-- Main JS File -->
    <script src="fontend/js/main.js"></script>
</body>

</html>
