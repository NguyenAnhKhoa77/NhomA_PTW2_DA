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
                    <form id="myForm" method="POST" action="{{ route('manufacture.store') }}" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Manufacturer name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Manufacturer logo</label>
                                <input type="file" name="image" accept="image/png, image/jpg, image/jpeg"
                                    class="form-control-file">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Create new Manufacturer" class="btn btn-success float-right" id="submitBtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Your script here -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('myForm');
            const submitBtn = document.getElementById('submitBtn');

            form.addEventListener('submit', function () {
                // Vô hiệu hóa nút submit và thay đổi văn bản thành "Đang xử lí..."
                submitBtn.disabled = true;
                submitBtn.value = 'Đang xử lí...';
            });
        });
    </script>
@endsection
