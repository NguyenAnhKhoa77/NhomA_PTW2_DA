@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm nhãn hiệu mới</h3>
                    </div>
                    <form method="POST" action="{{ route('manufacture.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Manufacter name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Manufacter logo</label>
                                <input type="file" name="image" accept="image/png, image/jpg, image/jpeg"
                                    class=" form-control-file">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Create new Manufacturer" class="btn btn-success float-right">
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
