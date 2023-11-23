@extends('backend.header')
@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="mt-3"></div>
                <h3 class="card-title">Danh sách sản phẩm</h3>
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
                            <th style="width: 15%">Tên</th>
                            <th style="width: 10%">Loại sản phẩm</th>
                            <th style="width: 10%">Nhãn hiệu</th>
                            <th style="width: 20%">Mô tả</th>
                            <th style="width: 10%">Giá</th>
                            <th style="width: 10%">Tồn kho</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>nonono</td>

                            <td class="project-actions text-right">

                                <form method="get" action="{{ route('product.delete', 99999999999999) }}">
                                    @csrf
                                    <button type="submit">
                                        <a class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </button>
                                </form>

                            </td>
                        </tr>
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
                                <td>{{ $product->inventory }} </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('product.edit', [$product]) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form method="get" action="{{ route('product.delete', [$product]) }}">
                                        @csrf
                                        <button type="submit">
                                            <a class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </button>
                                    </form>

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
