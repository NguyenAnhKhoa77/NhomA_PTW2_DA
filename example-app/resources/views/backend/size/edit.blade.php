@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                    </div>

                    <form action="{{ route('size.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $size->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Email address</label>
                                <input type="text" name="name" class="form-control" id="name" name="name"
                                    value="{{ $size->name }}" placeholder="Enter text">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a href="#" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Create new Project" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
