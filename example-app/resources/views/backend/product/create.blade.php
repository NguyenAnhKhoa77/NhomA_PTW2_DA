@extends('backend.header')
@section('title', 'Add product')
@section('content')
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
            <form action="{{ route('product.create.handle') }}" method="GET">
                <div class="row">
                    <div class="col">
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
                                    <input type="text" name="price" class="form-control">
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
                    </div>
                </div>

            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
