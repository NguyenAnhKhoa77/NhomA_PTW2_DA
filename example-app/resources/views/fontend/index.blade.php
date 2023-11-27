@extends('fontend.black')
@section('title', 'Home')
@section('content')
    <main class="main">
        <div class="intro-slider-container">
            <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
                <div class="intro-slide">
                    <img class="background" src="{{ url('images/banner/banner1.jpg', []) }}" alt="">
                    <div class="container intro-content">
                        <a href="category" class="btn btn-primary">
                            <span>Mua ngay</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->

                <div class="intro-slide">
                    <img class="background" src="{{ url('images/banner/banner2.jpg', []) }}" alt="">
                    <div class="container intro-content">
                        <a href="category" class="btn btn-primary">
                            <span>Mua ngay</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->

                <div class="intro-slide">
                    <img class="background" src="{{ url('images/banner/banner3.jpg', []) }}" alt="">
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
                        <a href="{{ url('grid?sex=2', []) }}">
                            <img src="{{ url('images/banner/nu.jpg', []) }}" alt="Banner">
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
                        <a href="{{ url('grid?sex=1', []) }}">
                            <img src="{{ url('images/banner/nam.jpg', []) }}" alt="Banner">
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
                            <img src="{{ url('images/banner/phukien.jpg', []) }}" alt="Banner">
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
                @foreach ($productsMale as $product)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="product product-5 text-center">
                            <figure class="product-media">
                                <?php $newId = encrypt($product->id); ?>
                                <a href="{{ route('detail', $newId) }}">
                                    <img src="{{ url('images/products/' . $product->image, []) }}" alt="Product image"
                                        class="product-image">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="{{ route('wishlist.add', $product->id) }}"
                                        class="btn-product-icon btn-wishlist btn-expandable"><span>Add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                                <div class="product-action">
                                    <form action="{{ route('cart.add', ['productId' => $product->id]) }}" class="w-100"
                                        method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="btn-product btn-cart border-0 w-100 text-white text-xs">add to
                                            cart</button>
                                    </form>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
                            <div class="product-body">
                                <h3 class="product-title">
                                    <a href="product">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    {{ $product->price }} VND
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                @endforeach
            </div><!-- End .row -->
            <div class="row justify-content-center">
                <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
        </div>
        <div class="mb-5"></div><!-- End .mb-5 -->
        <div class="container">
            <h2 class="title text-center mb-3">Đồ thể thao nữ</h2><!-- End .title -->
            <div class="row">
                @foreach ($productsFemale as $product)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="product product-5 text-center">
                            <figure class="product-media">
                                <?php $newId = encrypt($product->id); ?>
                                <a href="{{ route('detail', $newId) }}">
                                    <img src="{{ url('images/products/' . $product->image, []) }}" alt="Product image"
                                        class="product-image">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="{{ route('wishlist.add', $product->id) }}"
                                        class="btn-product-icon btn-wishlist btn-expandable"><span>Add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                                <div class="product-action">
                                    <form action="{{ route('cart.add', ['productId' => $product->id]) }}" class="w-100"
                                        method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="btn-product btn-cart border-0 w-100 text-white text-xs">add to
                                            cart</button>
                                    </form>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
                            <div class="product-body">
                                <h3 class="product-title">
                                    <a href="product">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    {{ $product->price }} VND
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                @endforeach
            </div><!-- End .row -->
            <div class="row justify-content-center">
                <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
        </div>
        <div class="mb-5"></div><!-- End .mb-5 -->
        <div class="container">
            <h2 class="title text-center mb-3">Phụ kiện</h2><!-- End .title -->
            <div class="row">
                @foreach ($productsAccessory as $product)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="product product-5 text-center">
                            <figure class="product-media">
                                <?php $newId = encrypt($product->id); ?>
                                <a href="{{ route('detail', $newId) }}">
                                    <img src="{{ url('images/products/' . $product->image, []) }}" alt="Product image"
                                        class="product-image">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="{{ route('wishlist.add', $product->id) }}"
                                        class="btn-product-icon btn-wishlist btn-expandable"><span>Add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                                <div class="product-action">
                                    <form action="{{ route('cart.add', ['productId' => $product->id]) }}" class="w-100"
                                        method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="btn-product btn-cart border-0 w-100 text-white text-xs">add to
                                            cart</button>
                                    </form>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
                            <div class="product-body">
                                <h3 class="product-title">
                                    <a href="product">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    {{ $product->price }} VND
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 col-xl-2 -->
                @endforeach
            </div><!-- End .row -->
            <div class="row justify-content-center">
                <a href="#" class="btn btn-primary">Xem thêm</a>
            </div>
        </div>
        <div class="mb-5"></div><!-- End .mb-5 -->

    </main><!-- End .main -->
@endsection
