@extends('backend.header')

@section('content')
    <h1>Create Comment</h1>

    <form action="{{ route('comment.store') }}" method="post">
        @csrf
        <label for="product_id">Product ID:</label>
        <input type="text" name="product_id" required>
        <label for="comment">Comment:</label>
        <textarea name="comment" required></textarea>
        <button type="submit">Create Comment</button>
    </form>
@endsection