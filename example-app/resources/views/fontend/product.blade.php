@extends('fontend.black')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Áo thun thể thao Achilles xám</li>
                </ol>

                <nav class="product-pager ml-auto" aria-label="Product">
                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Prev</span>
                    </a>

                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                        <span>Next</span>
                        <i class="icon-angle-right"></i>
                    </a>
                </nav><!-- End .pager-nav -->
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom" src="images/products/Ao-achilles-xam-1.jpg"
                                            data-zoom-image="images/products/Ao-achilles-xam-1.jpg" alt="product image">
                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->

                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        <a class="product-gallery-item active" href="#"
                                            data-image="images/products/Ao-achilles-xam-1.jpg"
                                            data-zoom-image="images/products/Ao-achilles-xam-1.jpg">
                                            <img src="images/products/Ao-achilles-xam-1.jpg" alt="product side">
                                        </a>

                                        <a class="product-gallery-item" href="#"
                                            data-image="images/products//Ao-achilles-xam-2.jpg"
                                            data-zoom-image="images/products/Ao-achilles-xam-2.jpg">
                                            <img src="images/products/Ao-achilles-xam-2.jpg" alt="product cross">
                                        </a>
                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">Áo thun thể thao Achilles xám</h1>
                                <!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price">
                                    149,000₫
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>Áo thun thể thao Achilles xám là một trong những mẫu áo thể thao “Thần Thoại Hy Lạp”
                                        của 2020 năm nay. Áo được thiết kế với phong cách thời trang, năng động, cùng với
                                        chất liệu co giản 4 chiều. Đây sẽ là một trong những mẫu trang phục không thể thiếu
                                        khi đồng hành cùng bạn đến phòng tập hay bất cứ môn thể thao nào.</p>
                                </div><!-- End .product-content -->

                                <div class="">
                                    <label>Màu sắc: Xám – Xanh dương</label>
                                </div><!-- End .details-filter-row -->

                                <div class="details-filter-row details-row-size">
                                    <label for="size">Kích thước:</label>
                                    <div class="select-custom">
                                        <select name="size" id="size" class="form-control">
                                            <option value="#" selected="selected">Select a size</option>
                                            <option value="s">Small</option>
                                            <option value="m">Medium</option>
                                            <option value="l">Large</option>
                                            <option value="xl">Extra Large</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                </div><!-- End .details-filter-row -->

                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Số lượng:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" value="1"
                                            min="1" max="10" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    <a href="#" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a>

                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Thêm vào
                                                Wishlist</span></a>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Loại:</span>
                                        <a href="#">Nam</a>,
                                        <a href="#">Áo thun thể thao</a>
                                    </div><!-- End .product-cat -->
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Product Information</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat
                                    mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper
                                    suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam
                                    porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices
                                    nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique
                                    cursus. </p>
                                <ul>
                                    <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. </li>
                                    <li>Vivamus finibus vel mauris ut vehicula.</li>
                                    <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                                </ul>

                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat
                                    mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper
                                    suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam
                                    porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices
                                    nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique
                                    cursus. </p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                            aria-labelledby="product-review-link">
                            <div class="reviews">
                                <h3>Reviews (2)</h3>
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">Samanta J.</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">6 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Good, perfect size</h4>

                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum
                                                    dolores assumenda asperiores facilis porro reprehenderit animi culpa
                                                    atque blanditiis commodi perspiciatis doloremque, possimus, explicabo,
                                                    autem fugit beatae quae voluptas!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->

                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">John Doe</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">5 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Very good</h4>

                                            <div class="review-content">
                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis
                                                    laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi,
                                                    quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                <h2 class="title text-center mb-4">Sản phẩm liên quan</h2><!-- End .title text-center -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
