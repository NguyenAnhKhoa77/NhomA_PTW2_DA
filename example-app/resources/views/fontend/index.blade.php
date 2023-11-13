@extends('fontend.black')
@section('title', 'Home')
@section('content')
    <main class="main">
        <div class="intro-slider-container">
            <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
                <div class="intro-slide">
                    <img class="background" src="{{ url('fontend/images/banner/banner1.jpg', []) }}" alt="">
                    <div class="container intro-content">
                        <a href="category" class="btn btn-primary">
                            <span>Mua ngay</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->

                <div class="intro-slide">
                    <img class="background" src="{{ url('fontend/images/banner/banner2.jpg', []) }}" alt="">
                    <div class="container intro-content">
                        <a href="category" class="btn btn-primary">
                            <span>Mua ngay</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->

                <div class="intro-slide">
                    <img class="background" src="{{ url('fontend/images/banner/banner3.jpg', []) }}" alt="">
                    <div class="container intro-content">
                        <a href="category" class="btn btn-primary">
                            <span>Mua ngay</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->
            </div><!-- End .owl-carousel owl-simple -->
            <span class="slider-loader text-white"></span><!-- End .slider-loader -->
        </div><!-- End .intro-slider-container -->
        <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-cat">
                        <a href="#">
                            <img src="{{ url('fontend/images/banner/nu.jpg', []) }}" alt="Banner">
                        </a>
                        <div class="banner-content">
                            <h3 class="banner-title">Đồ thể thao nữ</h3><!-- End .banner-title -->
                            <h4 class="banner-subtitle">18 Products</h4><!-- End .banner-subtitle -->
                            <a href="#" class="banner-link">Shop Now</a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-cat">
                        <a href="#">
                            <img src="{{ url('fontend/images/banner/nam.jpg', []) }}" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h3 class="banner-title">Đồ thể thao nam</h3><!-- End .banner-title -->
                            <h4 class="banner-subtitle">12 Products</h4><!-- End .banner-subtitle -->
                            <a href="#" class="banner-link">Shop Now</a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-cat">
                        <a href="#">
                            <img src="{{ url('fontend/images/banner/phukien.jpg', []) }}" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h3 class="banner-title">Phụ kiện thể thao</h3><!-- End .banner-title -->
                            <h4 class="banner-subtitle">12 Products</h4><!-- End .banner-subtitle -->
                            <a href="#" class="banner-link">Shop Now</a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div>
        <div class="mb-5"></div><!-- End .mb-5 -->
        <div class="container">
            <h2 class="title text-center mb-3">Đồ thể thao nam</h2><!-- End .title -->
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <span class="product-label label-top">Top</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-1.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Brown cable knit cardigan</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">$50.00</span>
                                <span class="old-price">$84.00</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <a href="product">
                                <img src="assets/images/products/elements/product-2.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Hooded parka jacket</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                $120.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 0 Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <span class="product-label label-sale">Sale</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-3.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Grey cable knit longline maxi cardigan</a>
                            </h3><!-- End .product-title -->
                            <div class="product-price">
                                $110.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #cc9966;"><span
                                        class="sr-only">Color name</span></a>
                                <a href="#" style="background: #7fc5ed;"><span class="sr-only">Color
                                        name</span></a>
                                <a href="#" style="background: #e8c97a;"><span class="sr-only">Color
                                        name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 product-disabled text-center">
                        <figure class="product-media">
                            <span class="product-label label-out">Out Of Stock</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-4.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Orange snake print scarf</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                <div class="out-price">$120.00</div><!-- End .out-price -->
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-5.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Beige knitted elastic runner shoes</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                $84.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 0 Reviews )</span>
                            </div><!-- End .rating-container -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" style="background: #cc9966;"><span class="sr-only">Color
                                        name</span></a>
                                <a href="#" class="active" style="background: #ebebeb;"><span
                                        class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <a href="product">
                                <img src="assets/images/products/elements/product-6.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Grey check skinny suit jacket</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                $180.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
            </div><!-- End .row -->
            <div class="row justify-content-center">
                <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
        </div>
        <div class="mb-5"></div><!-- End .mb-5 -->
        <div class="container">
            <h2 class="title text-center mb-3">Đồ thể thao nữ</h2><!-- End .title -->
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <span class="product-label label-top">Top</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-1.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Brown cable knit cardigan</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">$50.00</span>
                                <span class="old-price">$84.00</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <a href="product">
                                <img src="assets/images/products/elements/product-2.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Hooded parka jacket</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                $120.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 0 Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <span class="product-label label-sale">Sale</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-3.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Grey cable knit longline maxi cardigan</a>
                            </h3><!-- End .product-title -->
                            <div class="product-price">
                                $110.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #cc9966;"><span
                                        class="sr-only">Color name</span></a>
                                <a href="#" style="background: #7fc5ed;"><span class="sr-only">Color
                                        name</span></a>
                                <a href="#" style="background: #e8c97a;"><span class="sr-only">Color
                                        name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 product-disabled text-center">
                        <figure class="product-media">
                            <span class="product-label label-out">Out Of Stock</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-4.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Orange snake print scarf</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                <div class="out-price">$120.00</div><!-- End .out-price -->
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-5.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Beige knitted elastic runner shoes</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                $84.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 0 Reviews )</span>
                            </div><!-- End .rating-container -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" style="background: #cc9966;"><span class="sr-only">Color
                                        name</span></a>
                                <a href="#" class="active" style="background: #ebebeb;"><span
                                        class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <a href="product">
                                <img src="assets/images/products/elements/product-6.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Grey check skinny suit jacket</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                $180.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
            </div><!-- End .row -->
            <div class="row justify-content-center">
                <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
        </div>
        <div class="mb-5"></div><!-- End .mb-5 -->
        <div class="container">
            <h2 class="title text-center mb-3">Phụ kiện</h2><!-- End .title -->
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <span class="product-label label-top">Top</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-1.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Brown cable knit cardigan</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">$50.00</span>
                                <span class="old-price">$84.00</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <a href="product">
                                <img src="assets/images/products/elements/product-2.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Hooded parka jacket</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                $120.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 0 Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <span class="product-label label-sale">Sale</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-3.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Grey cable knit longline maxi cardigan</a>
                            </h3><!-- End .product-title -->
                            <div class="product-price">
                                $110.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #cc9966;"><span
                                        class="sr-only">Color name</span></a>
                                <a href="#" style="background: #7fc5ed;"><span class="sr-only">Color
                                        name</span></a>
                                <a href="#" style="background: #e8c97a;"><span class="sr-only">Color
                                        name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 product-disabled text-center">
                        <figure class="product-media">
                            <span class="product-label label-out">Out Of Stock</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-4.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Orange snake print scarf</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                <div class="out-price">$120.00</div><!-- End .out-price -->
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="product">
                                <img src="assets/images/products/elements/product-5.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Beige knitted elastic runner shoes</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                $84.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 0 Reviews )</span>
                            </div><!-- End .rating-container -->
                            <div class="product-nav product-nav-dots">
                                <a href="#" style="background: #cc9966;"><span class="sr-only">Color
                                        name</span></a>
                                <a href="#" class="active" style="background: #ebebeb;"><span
                                        class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->

                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-5 text-center">
                        <figure class="product-media">
                            <a href="product">
                                <img src="assets/images/products/elements/product-6.jpg" alt="Product image"
                                    class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                                        view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="product">Grey check skinny suit jacket</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                $180.00
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-footer">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
            </div><!-- End .row -->
            <div class="row justify-content-center">
                <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
        </div>
        <div class="mb-5"></div><!-- End .mb-5 -->

    </main><!-- End .main -->
@endsection
