@extends('backend.header')
@section('content')
    <h1>Edit Comment</h1>

    <form action="{{ route('comments.update', $comment->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="product_id">Product ID:</label>
        <input type="text" name="product_id" value="{{ $comment->product_id }}" required>
        <label for="comment">Comment:</label>
        <textarea name="comment" required>{{ $comment->comment }}</textarea>
        <button type="submit">Update Comment</button>
    </form>
@endsection