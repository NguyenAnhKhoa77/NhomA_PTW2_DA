@extends('fontend.black')
@section('content')
    <main class="main">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Showing <span>{{ $products->count() }} of {{ $productsAllCount }}</span> Products
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

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
                                                <h3 class="product-title"><a href="product.html">Brown paperbag waist pencil
                                                        skirt</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    $60.00
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div><!-- End .rating-container -->
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
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget widget-clean -->

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
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-1">
                                                    <label class="custom-control-label" for="cat-1">Dresses</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">3</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-2">
                                                    <label class="custom-control-label" for="cat-2">T-shirts</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">0</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-3">
                                                    <label class="custom-control-label" for="cat-3">Bags</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">4</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-4">
                                                    <label class="custom-control-label" for="cat-4">Jackets</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">2</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-5">
                                                    <label class="custom-control-label" for="cat-5">Shoes</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">2</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-6">
                                                    <label class="custom-control-label" for="cat-6">Jumpers</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">1</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-7">
                                                    <label class="custom-control-label" for="cat-7">Jeans</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">1</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-8">
                                                    <label class="custom-control-label" for="cat-8">Sportwear</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">0</span>
                                            </div><!-- End .filter-item -->
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                        aria-controls="widget-2">
                                        Size
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-2">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-1">
                                                    <label class="custom-control-label" for="size-1">XS</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-2">
                                                    <label class="custom-control-label" for="size-2">S</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked
                                                        id="size-3">
                                                    <label class="custom-control-label" for="size-3">M</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked
                                                        id="size-4">
                                                    <label class="custom-control-label" for="size-4">L</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-5">
                                                    <label class="custom-control-label" for="size-5">XL</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-6">
                                                    <label class="custom-control-label" for="size-6">XXL</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
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
                                                <span id="filter-price-range"></span>
                                            </div><!-- End .filter-price-text -->

                                            <div id="price-slider"></div><!-- End #price-slider -->
                                        </div><!-- End .filter-price -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
