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
      
        <div class="mb-5"></div><!-- End .mb-5 -->
        <div class="container">
        <h2 class="title text-center mb-3">Kết quả tìm kiếm cho "{{ $keyword }}"</h2>

<div class="row">
    @if ($products->isEmpty())
        <div class="col-12 text-center">
            <p>Không có sản phẩm nào được tìm thấy.</p>
        </div>
    @else
        @foreach ($products as $product)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                <div class="product product-5 text-center">
                    <figure class="product-media">
                        <a href="{{ route('product', ['id' => $product->id]) }}">
                            <img src="{{ url('images/products/' . $product->image) }}" alt="{{ $product->name }}">
                        </a>
                    </figure>
                    <div class="product-body">
                        <h3 class="product-title">
                            <a href="{{ route('product', ['id' => $product->id]) }}">
                                {{ $product->name }}
                            </a>
                        </h3>
                        <div class="product-price">
                            <span class="new-price">{{ $product->price }}</span>
                        </div>
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-6 col-md-4 col-lg-3 col-xl-2 -->
        @endforeach
    @endif
</div><!-- End .row -->


<div class="row justify-content-center">
    <div class="col-12">
        {{ $products->links() }}
    </div>
</div>
    </div>
        <div class="mb-5"></div><!-- End .mb-5 -->
        
        <div class="mb-5"></div><!-- End .mb-5 -->
       
        <div class="mb-5"></div><!-- End .mb-5 -->

    </main><!-- End .main -->
@endsection
