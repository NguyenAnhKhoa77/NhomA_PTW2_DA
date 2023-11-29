@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects</h3>

                <div class="card-tools">
                    <a type="button" class="btn btn-tool" href="{{ route('size.create', []) }}">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 10%">
                                #
                            </th>
                            <th style="width: 30%">
                                Kích thước
                            </th>
                            <th style="width: 30%">
                                Số sản phẩm thuộc
                            </th>
                            <th style="width: 20%">
                                #
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sizes as $size)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    {{ $size->name }}
                                </td>
                                <td>
                                    {{ $size->products->count() }}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('size.edit', [$size]) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>

                                    <form id="delete-form{{ $size->id }}" action="{{ route('size.destroy', [$size]) }}"
                                        method="post" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="">Delete</button>
                                    </form>
                                    <a class="btn btn-danger btn-sm"
                                        onclick="confirmDelete{{ $size->id }}(event)">Delete</a>
                                </td>

                                <script>
                                    function confirmDelete{{ $size->id }}(event) {
                                        event.preventDefault();

                                        if (confirm('Bạn có chắc chắn muốn xóa không?')) {
                                            document.getElementById('delete-form{{ $size->id }}')
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
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
