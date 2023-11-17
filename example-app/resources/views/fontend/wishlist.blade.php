@extends('fontend.black')
@section('title', 'Wishlist')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: {{ url('assets/images/page-header-bg.jpg') }}">
            <div class="container">
                <h1 class="page-title">Wishlist<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product') }}">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                @if($wishlistProducts != null)
                <table class="table table-wishlist table-mobile">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Stock Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($wishlistProducts as $wishlistProduct)
                        <tr>
                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ route('product') }}">
                                            <img src="{{ asset("images/products/$wishlistProduct->image") }}" alt="Product image">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="{{ route('product') }}">{{ $wishlistProduct->name }}</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col">{{ $wishlistProduct->price }}</td>
                            <td class="stock-col"><span class="in-stock">In stock</span></td>
                            <td class="action-col">
                                <button class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to
                                    Cart</button>
                            </td>
                            <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                        </tr>
                    @endforeach
                        <tr>
                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="assets/images/products/table/product-3.jpg" alt="Product image">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="#">Orange saddle lock front chain cross body bag</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col">$52.00</td>
                            <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>
                            <td class="action-col">
                                <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>
                            </td>
                            <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                        </tr>
                    </tbody>
                </table>
                @else
                    <p class="text-center">You don't have any product in wishlist!</p>
                @endif<!-- End .table table-wishlist -->
{{--                <div class="wishlist-share">--}}
{{--                    <div class="social-icons social-icons-sm mb-2">--}}
{{--                        <label class="social-label">Share on:</label>--}}
{{--                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i--}}
{{--                                class="icon-facebook-f"></i></a>--}}
{{--                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i--}}
{{--                                class="icon-twitter"></i></a>--}}
{{--                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i--}}
{{--                                class="icon-instagram"></i></a>--}}
{{--                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i--}}
{{--                                class="icon-youtube"></i></a>--}}
{{--                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i--}}
{{--                                class="icon-pinterest"></i></a>--}}
{{--                    </div><!-- End .soial-icons -->--}}
{{--                </div><!-- End .wishlist-share -->--}}
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
