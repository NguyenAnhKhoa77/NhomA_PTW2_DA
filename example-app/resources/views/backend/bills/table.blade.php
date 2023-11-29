@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách đơn hàng</h3>

                <div class="card-tools">
                    <a type="button" href="{{ route('bill.create', []) }}" class="btn btn-tool">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>User_id</th>
                            <th>Address</th>
                            <th>Shipping</th>
                            <th>Total</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bill as $item_bill)
                            <tr>
                                <td>{{ $item_bill->user_id }} </td>
                                <td>{{ $item_bill->address }} </td>
                                <td>{{ $item_bill->shipping }} </td>
                                <td>{{ $item_bill->total }} </td>
                                <td>{{ $item_bill->phone }} </td>
                                <td>
                                    @if ($item_bill->status == 0)
                                        <span class="text-secondary">Chưa giao</span>
                                    @elseif($item_bill->status == 1)
                                        <span class="text-secondary">Đã giao</span>
                                    @endif
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('bill.edit', $item_bill->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('bill.destroy', $item_bill->id) }}"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table> {{ $bill->links('pagination::bootstrap-5') }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
