@extends('backend.header')
@section('title', 'Product - Table')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>

            {{ session('success') }}
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
            {{ session('errors') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i>Warning!</h5>
            {{ session('warning') }}
        </div>
    @endif
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="mt-3"></div>
                    <h3 class="card-title">Projects</h3>
                    <div class="card-tools">
                        <a type="button" class="btn btn-tool" title="Collapse">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 15%">Name</th>
                                <th style="width: 10%">Categories</th>
                                <th style="width: 10%">Manufacturer</th>
                                <th style="width: 20%">Description</th>
                                <th style="width: 10%">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td> <img style="width: 50px" src="{{ url('images/' . $product->image, []) }}"
                                            alt="">
                                        <span class="ml-2">{{ $product->name }}</span>
                                    </td>
                                    <td>{{ $product->categories->name }} </td>
                                    <td>{{ $product->manufacturer->name }} </td>
                                    <td style=" word-break: break-all;">
                                        {{ Str::limit($product->description, 100) }}</td>

                                    <td>{{ $product->price }} </td>

                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="">
                                            <i class="fas fa-pencil-alt"> </i> Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="">
                                            <i class="fas fa-trash"> </i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table> {{ $products->links('pagination::bootstrap-5') }}
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
