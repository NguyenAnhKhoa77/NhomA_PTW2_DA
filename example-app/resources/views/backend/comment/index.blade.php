@extends('backend.header')
@section('content')
    <h1>Comments</h1>

    <a href="{{ route('comments.create') }}" class="btn btn-success">Add Comment</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Link</th>
                <th>Comment</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->product_id }}</td>
                    <td>{{ $comment->product_name }}</td>
                    <td>
    <a href="{{ route('product', encrypt($comment->product_id)) }}">
        {{ $comment->product_name }}
    </a>
</td>

                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td>{{ $comment->updated_at }}</td>
                    <td>
                        <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('comments.destroy', $comment->id) }}" class="btn btn-danger" 
                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $comment->id }}').submit();">
                            Delete
                        </a>
                        <form id="delete-form-{{ $comment->id }}" action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection