@extends('backend.header')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img src="{{ asset('' . $user->avatar) }}" alt="Avatar" style="max-width:200px">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <ul class="list-group list-group-unbordered mb-3">

                            </ul>

                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-block"><b>Change profile</b></a>
                            <a href="{{ route('users.changePassword', $user) }}" class="btn btn-primary btn-block"><b>Change password</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">{{ $user->address }} </p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
                            <p>{{ optional($user->user)->email ?? 'N/A' }}</p>
                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Number phone</strong>
                            <p>{{ $user->phone }} </p>
                            <hr>
                            <strong><i class="fas fa-calendar-alt mr-1"></i> Update gần nhất</strong>
                            <p>{{ $user->updated_at }} </p>
                            <hr>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
