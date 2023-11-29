@extends('backend.header')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>E-commerce</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">E-commerce</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img src="{{ url('images/products/' . $product->image, []) }}" class="product-image"
                                alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb active"><img
                                    src="{{ url('images/products/' . $product->image, []) }}" alt="Product Image"></div>
                            <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $product->name }}</h3>
                        <p>{{ $product->description }} </p>

                        <hr>
                        <h4 class="mt-3">Size <small>Please select one</small></h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @foreach ($product->sizes as $size)
                                <label class="btn btn-default text-center">
                                    {{ $size->name }}
                                </label>
                            @endforeach
                        </div>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                {{ number_format($product->price) }} VND
                            </h2>
                        </div>

                        <div class="mt-4">

                            <a type="button" class="btn btn-primary" href="{{ route('product.edit', [$product]) }}">
                                <i class="fas fa-pencil-alt"> </i>
                                Edit</a>

                            <a type="button" class="btn btn-primary" href="{{ route('product.addsize', [$product]) }}">
                                <i class="fas fa-pencil-alt"></i>
                                Add size</a>

                            <a type="button" class="btn btn-primary" href="">
                                <i class="fas fa-pencil-alt"></i>
                                Add image</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                // Loại bỏ class active từ tất cả các ảnh
                $('.product-image-thumb').removeClass('active');
                // Thêm class active cho ảnh được click
                $(this).addClass('active');

                // Thay đổi đường dẫn của ảnh lớn
                var newImageSrc = $(this).find('img').attr('src');
                $('.product-image').attr('src', newImageSrc);
            });
        });
    </script>
@endsection
