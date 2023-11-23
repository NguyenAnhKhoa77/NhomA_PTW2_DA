@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit product</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('product.edit.handle', [$product->unique_token]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control   @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $product->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <div class="">
                            <img id="currentImage" src="{{ url('images/products/' . $product->image, []) }}"
                                alt="{{ $product->image }}" style="max-width: 100px;max-height: 100px">
                            <input class="form-control   @error('image') is-invalid @enderror" name="image" type="file"
                                style="width: 500px" id="imageInput" accept="image/png, image/gif, image/jpeg">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select name="cate" class="form-control custom-select @error('cate') is-invalid @enderror">
                            @foreach ($cates as $cate)
                                @if ($cate->id == $product->categories_id)
                                    <option selected value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @else
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('cate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Manufacter</label>
                        <select name="manu" class="form-control custom-select @error('manu') is-invalid @enderror">
                            @foreach ($manus as $manu)
                                @if ($manu->id == $product->manufacturer_id)
                                    <option selected value="{{ $manu->id }}">{{ $manu->name }}</option>
                                @else
                                    <option value="{{ $manu->id }}">{{ $manu->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control  @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" class="form-control   @error('price') is-invalid @enderror" name="price"
                            value="{{ old('price', $product->price) }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Số lượng trong kho</label>
                        <input type="text" class="form-control   @error('inventory') is-invalid @enderror"
                            name="inventory" value="{{ old('inventory', $product->inventory) }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Save" class="btn btn-success float-right"
                                onclick="return confirm('Bạn có chắc chắn muốn sửa không?')">
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection
