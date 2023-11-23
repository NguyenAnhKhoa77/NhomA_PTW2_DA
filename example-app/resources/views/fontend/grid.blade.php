@extends('fontend.black')
@section('content')
    <main class="main">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">Most Popular</option>
                                            <option value="rating">Most Rated</option>
                                            <option value="date">Date</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        <div class="products mb-3">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="{{ url('images/products/' . $product->image, []) }}"
                                                        alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                        class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                            wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>add to
                                                            cart</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="product.html">{{ $product->name }}</a>
                                                </h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    {{ number_format($product->price) }} VND
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                @endforeach
                            </div><!-- End .row -->
                        </div><!-- End .products -->

                        {{ $products->links('pagination::bootstrap-5') }}
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <form action="{{ route('search') }}" method="get">

                                <div class="widget widget-clean">
                                    <label>Filters:</label>

                                </div><!-- End .widget widget-clean -->
                                <input type="search" class="form-control" value="{{ old('name') }}"
                                    name="name"placeholder="Search product ...">

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                            aria-controls="widget-1">
                                            Giới tính
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                @foreach ($sexs as $sex)
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                name="sex" id="sex-{{ $sex->id }}"
                                                                value="{{ $sex->id }}">
                                                            <label class="custom-control-label"
                                                                for="sex-{{ $sex->id }}">{{ $sex->text }}</label>
                                                        </div><!-- End .custom-radio -->
                                                    </div>
                                                @endforeach
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                            aria-controls="widget-1">
                                            Category
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                @foreach ($categories as $category)
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                name="category" id="cat-{{ $category->id }}"
                                                                value="{{ $category->id }}">
                                                            <label class="custom-control-label"
                                                                for="cat-{{ $category->id }}">{{ $category->name }}</label>
                                                        </div><!-- End .custom-radio -->
                                                    </div>
                                                @endforeach
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                            aria-controls="widget-5">
                                            Price
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-5">
                                        <div class="widget-body">
                                            <div class="filter-price">
                                                <div class="filter-price-text">
                                                    Price Range:
                                                </div><!-- End .filter-price-text -->
                                                @foreach ($priceranges as $pricerange)
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                name="pricerange" id="pri-{{ $pricerange->id }}"
                                                                value="{{ $pricerange->id }}">
                                                            <label class="custom-control-label"
                                                                for="pri-{{ $pricerange->id }}">{{ $pricerange->price_min }}
                                                                - {{ $pricerange->price_max }}</label>
                                                        </div><!-- End .custom-radio -->
                                                    </div>
                                                @endforeach

                                            </div><!-- End .filter-price -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->
                                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            </form>
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
