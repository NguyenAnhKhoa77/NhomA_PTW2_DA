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
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                @if(count($wishlistProducts) > 0)
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
                                            <a href="{{ route('product', $wishlistProduct->id) }}">
                                                <img src="{{ asset("images/products/$wishlistProduct->image") }}"
                                                     alt="Product image">
                                            </a>
                                        </figure>

                                        <h3 class="product-title">
                                            <a href="{{ route('product', $wishlistProduct->id) }}">{{ $wishlistProduct->name }}</a>
                                        </h3><!-- End .product-title -->
                                    </div><!-- End .product -->
                                </td>
                                <td class="price-col">{{ $wishlistProduct->price }} VNĐ</td>
                                <td class="stock-col">@if($wishlistProduct->stock > 0)
                                        <span class="in-stock">In Stock</span>
                                    @else
                                        <span class="out-of-stock">Out of Stock</span>
                                    @endif
                                </td>
                                <td class="action-col">
                                    @if($wishlistProduct->stock > 0)
                                        <button class="btn btn-block btn-outline-primary-2"><i
                                                class="icon-cart-plus"></i>Add to
                                            Cart
                                        </button>
                                    @else
                                        <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock
                                        </button>
                                    @endif
                                </td>
                                <td class="remove-col">
                                    <form action="{{ route('wishlist.remove', $wishlistProduct->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-remove"><i class="icon-close"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">You don't have any product in wishlist!</p>
                @endif<!-- End .table table-wishlist -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
