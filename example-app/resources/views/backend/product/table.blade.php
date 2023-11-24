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
                                    <form id="delete-form{{ $product->id }}"
                                        action="{{ route('product.delete', [$product]) }}" method="get"
                                        style="display: none;">
                                        @csrf
                                        <button type="submit" onclick="">Delete</button>
                                    </form>
                                    <a class="btn btn-danger btn-sm"
                                        onclick="confirmDelete{{ $product->id }}(event)">Delete</a>
                                </td>
                                <script>
                                    function confirmDelete{{ $product->id }}(event) {
                                        event.preventDefault();

                                        if (confirm('Bạn có chắc chắn muốn xóa không?')) {
                                            document.getElementById('delete-form{{ $product->id }}')
                                                .submit();
                                        } else {
                                            // Hủy xóa nếu người dùng chọn Cancel trong hộp thoại xác nhận
                                            return false;
                                        }
                                    }
                                </script>
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
