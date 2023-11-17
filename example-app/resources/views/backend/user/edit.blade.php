@extends('backend.header')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Chỉnh sửa thông tin người dùng') }}</div>

                    <div class="card-body">
                    <form method="POST" action="{{ route('user.update', ['id' => $user->id]) }}">
    @csrf
    @method('POST') <!-- Sử dụng method PUT để Laravel biết đó là một request cập nhật -->

    <!-- Trường Tên -->
    <div class="form-group">
        <label for="name">Tên:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" required>
    </div>

    <!-- Trường Email -->
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control" required>
    </div>

    <!-- Trường Password -->
    <div class="form-group">
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" class="form-control" >
    </div>

    <!-- Các trường khác từ bảng tài khoản -->
    <!-- Ví dụ: Trường Phone -->
    <div class="form-group">
        <label for="phone">Số điện thoại:</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->account->phone) }}" class="form-control">
    </div>

    <!-- Các trường khác nếu cần -->

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
