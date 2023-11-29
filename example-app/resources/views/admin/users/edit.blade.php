@extends('backend.header')
@section('content')
    <h2>Edit User: {{ $user->name }}</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($user)
        <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="{{ $user->phone }}" required>

            <label for="address">Address:</label>
            <input type="text" name="address" value="{{ $user->address }}" required>

            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar">

            <button type="submit">Update User</button>
        </form>
    @else
        <p>User not found.</p>
    @endif
@endsection
