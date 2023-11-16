@extends('backend.header')
@section('title', 'Product - Table')
@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="mt-3"></div>
                <h3 class="card-title">Projects</h3>
                <div class="card-tools">
                    <a type="button" href="{{ route('product.create') }}" class="btn btn-tool" title="Collapse">
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
                                <td> <img style="width: 50px" src="{{ url('images/products/' . $product->image, []) }}"
                                        alt="">
                                    <span class="ml-2">{{ $product->name }}</span>
                                </td>
                                <td>{{ $product->categories->name }} </td>
                                <td>{{ $product->manufacturer->name }} </td>
                                <td style=" word-break: break-all;">
                                    {{ Str::limit($product->description, 100) }}</td>

                                <td>{{ $product->price }} </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{ route('product.view', []) }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('product.edit', [$product]) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
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
@endsection
