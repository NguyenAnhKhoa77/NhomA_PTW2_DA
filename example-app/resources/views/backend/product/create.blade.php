@extends('backend.header')
@section('title', 'Add product')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('product.create.handle') }}" method="POST" roles="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Categories</label>
                                <select id="inputStatus" name="cate" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach ($cates as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Manufacter</label>
                                <select id="inputStatus" name="manu" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach ($manus as $manu)
                                        <option value="{{ $manu->id }}">{{ $manu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" name="description" rows="4" value="{{ old('description') }}"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                            </div>
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" accept="image/png, image/gif, image/jpeg"
                                    class=" form-control-file">
                            </div>
                        </div>
                        <div class="card-footer">
                            <a onclick="window.history.back()" class="btn btn-secondary"
                                class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Create new Project" class="btn btn-success float-right">
                        </div>
                    </div>
                    <!-- /.card -->
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
