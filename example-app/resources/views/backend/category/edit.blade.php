@extends('backend.header')
@section('title', 'Edit Category')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">EDIT CATEGORY</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('category.update', $category->id) }}" id="editForm" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control   @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $category->name) }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Save" class="btn btn-success float-right"
                                        onclick="return confirm('Bạn có chắc chắn muốn lưu thay đổi không?')">
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
