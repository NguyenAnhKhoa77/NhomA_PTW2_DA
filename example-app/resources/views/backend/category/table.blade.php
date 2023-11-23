@extends('backend.header')
@section('title', 'Categories')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">CATEGORIES TABLE</h3>

                <div class="card-tools">
                    <a href="{{ route('category.create') }}" type="button" class="btn btn-tool">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <form action="{{ route('category.table') }}" method="GET">
                <div class="w-100 container-fluid my-2">
                    <h5>Tìm kiếm</h5>
                    <input type="text" name="keyword" placeholder="Nhập tên loại sản phẩm" class="form-control">
                    <button type="submit" name="submit" value="1" class="btn btn-primary mt-2">Tìm kiếm</button>
                </div>
                <div class="w-25">
                    <div class="container">
                        <h5>Bộ lọc</h5>

                        <select name="sort" class="form-control w-100">
                            <option value="1" {{ request('sort') == 1 ? 'selected' : '' }}>Sắp theo tên từ A - Z
                            </option>
                            <option value="2" {{ request('sort') == 2 ? 'selected' : '' }}>Sắp theo tên từ Z - A
                            </option>
                        </select>
                        <button class="btn btn-primary mt-2" name="submit" value="2">Xác nhận</button>

                    </div>
                </div>
            </form>
            <div class="card-body p-0">
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 40%">Name</th>
                                <th style="width: 20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }} </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('category.edit', $category->id) }}">
                                            <i class="fas fa-edit"></i> Edit </a>
                                        <a class="btn btn-danger btn-sm "
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                            href="{{ route('category.destroy', $category->id) }}">
                                            <i class="fas fa-trash">
                                            </i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
