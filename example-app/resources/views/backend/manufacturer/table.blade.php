@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách nhãn hàng</h3>

                <div class="card-tools">
                    <a type="button" href="{{ route('manufacture.create', []) }}" class="btn btn-tool">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 40%">Name</th>
                            <th style="width: 40%">Logo</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manufacturer as $manufactur)
                            <tr>
                                <td>{{ $manufactur->name }} </td>
                                <td> <img style="height: 80px;"
                                        src="{{ url('images/manufacturers/' . $manufactur->image, []) }}" alt="">
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('manufacture.edit', $manufactur->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('manufacture.destroy', $manufactur->id) }}"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table> {{ $manufacturer->links('pagination::bootstrap-5') }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
