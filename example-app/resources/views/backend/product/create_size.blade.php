@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add size product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('product.storesize', [$product->unique_token]) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @foreach ($sizes as $size)
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-2">
                                                <input name="sizes[]" value="{{ $size->id }}" class="form-check-input"
                                                    {{ $size->products->contains('id', $product->id) ? 'checked' : '' }}
                                                    type="checkbox">
                                                <label class="form-check-label">{{ $size->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Save" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
    </section>
    <!-- /.content -->
@endsection
