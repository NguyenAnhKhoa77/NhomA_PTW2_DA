@extends('backend.header')
@section('content')
    <h1>Show Comment</h1>

    <p><strong>Product ID:</strong> {{ $comment->product_id }}</p>
    <p><strong>Comment:</strong> {{ $comment->comment }}</p>
    <p><strong>Created At:</strong> {{ $comment->created_at }}</p>
    <p><strong>Updated At:</strong> {{ $comment->updated_at }}</p>
@endsection