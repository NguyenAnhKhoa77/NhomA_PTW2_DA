@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User table</h3>

                <div class="card-tools">
                    <a href="{{ route('user.create') }}">
                        <button type="button" class="btn btn-tool">
                            <i class="fas fa-plus"></i>
                        </button>
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 10%">Name</th>
                            <th style="width: 10%">Email</th>
                            <th style="width: 10%">Phone</th>
                            <th style="width: 10%">Address</th>
                            <th style="width: 30%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> <img style="width: 50px" src="{{ url('avatars/' . $user->avatar, []) }}"
                                        alt="">
                                <td>{{ $user->account->name }} </td>
                                <td>{{ $user->email }} </td>
                                <td>{{ $user->account->phone }} </td>
                                <td>{{ $user->account->address }} </td>
                                <td class="project-actions text-right">
                                    @if ($user->is_locked == false)
                                        <a class="btn btn-primary btn-sm" href="{{ route('user.lockUser', $user->id) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            lock
                                        </a>
                                    @elseif ($user->is_locked == true)
                                        <a class="btn btn-primary btn-sm" href="{{ route('user.unlockUser', $user->id) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            Unlock
                                        </a>
                                    @endif

                                    <a class="btn btn-primary btn-sm" href="{{ route('user.show', $user->id) }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('user.edit', $user->id) }}">
                                        <i class="fas fa-edit"></i>

                                        Edit
                                    </a>

                                    <a class="btn btn-danger btn-sm " href="{{ route('user.destroy', $user->id) }}"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                        <i class="fas fa-trash"> </i>
                                        Delete
                                    </a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('users.changePassword', $user) }}">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                        Change password</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $users->links('pagination::bootstrap-5') }}

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
