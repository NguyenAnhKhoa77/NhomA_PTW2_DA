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
                    <form action="{{ route('coupons.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Code</label>
                                <input type="text" name="code" class="form-control" id="exampleInputPassword1"
                                    placeholder="Code">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Discount percent</label>
                                <input type="number" name="discount_percent" class="form-control"
                                    id="exampleInputPassword1" placeholder="%">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Discount percent</label>
                                <input type="date" name="expiration_date" class="form-control"
                                    id="exampleInputPassword1">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Save" class="btn btn-success float-right">
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
