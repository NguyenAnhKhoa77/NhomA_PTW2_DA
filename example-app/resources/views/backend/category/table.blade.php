@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories Table</h3>

                <div class="card-tools">
                    <a href="{{ route('category.create') }}" type="button" class="btn btn-tool">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 40%">Logo</th>
                                <th style="width: 40%">Name</th>
                                <th style="width: 20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td> <img style="width: 100px"
                                            src="{{ url('images/category/' . $category->image, []) }}" alt="">
                                    </td>
                                    <td>{{ $category->name }} </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('category.edit', $category->id) }}">
                                            <i class="fas fa-edit"></i> Edit </a>
                                        <a class="btn btn-danger btn-sm "
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                            href="{{ route('category.destroy', $category->id) }}">
                                            <i class="fas fa-trash">
                                            </i> Delete </a>
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
