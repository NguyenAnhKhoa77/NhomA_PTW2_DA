@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('product.create.handle') }}" method="POST" roles="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Edit product</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name"
                                    class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Categories</label>
                                <select id="inputStatus" name="cate"
                                    class="form-control custom-select  @error('cate') is-invalid @enderror">
                                    <option selected disabled>Select one</option>
                                    @foreach ($cates as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                    <option value="9999999999999">no</option>
                                </select>
                                @error('cate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Manufacter</label>
                                <select id="inputStatus" name="manu"
                                    class="form-control custom-select @error('manu') is-invalid @enderror">
                                    <option selected disabled>Select one</option>
                                    @foreach ($manus as $manu)
                                        <option value="{{ $manu->id }}">{{ $manu->name }}</option>
                                    @endforeach
                                    <option value="9999999999999">no</option>
                                </select>
                                @error('manu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4"
                                    value="{{ old('description') }}"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" name="price"
                                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product quantity</label>
                                <input type="text" name="inventory"
                                    class="form-control  @error('inventory') is-invalid @enderror"
                                    value="{{ old('inventory') }}">
                                @error('inventory')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" accept="image/png, image/gif, image/jpeg"
                                    class=" @error('image') is-invalid @enderror form-control-file">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <a onclick="window.history.back()" class="btn btn-secondary"
                                class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Create new Project" class="btn btn-success float-right">
                        </div>
                    </div>
                    <!-- /.card -->
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
