<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\Comments;


class ControllerComment extends Controller
{
    public function index()
    {
        $comments = DB::table('comments')
        ->join('products', 'comments.product_id', '=', 'products.id')
        ->select('comments.*', 'products.name as product_name')
        ->get();

    foreach ($comments as $comment) {
        // Tạo link từ tên sản phẩm
        $comment->product_link = URL::to('/products/' . strtolower(str_replace(' ', '-', $comment->product_name)));
    }

    return view('backend.comment.index', compact('comments'));
    }

    public function create()
    {
        return view('backend.comment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'comment' => 'required',
        ]);

        Comments::create($request->all());

        return redirect()->route('backend.comment.index')->with('success', 'Comment created successfully.');
    }

    public function edit($id)
    {
        $comment = Comments::findOrFail($id);
        return view('backend.comment.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id|min:1',
    'comment' => 'required|max:255',
        ]);

        $comment = Comments::findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    public function destroy($id)
    {
        $comment = Comments::findOrFail($id);
        $comment->delete();

        return redirect()->route('backend.comment.index')->with('success', 'Comment deleted successfully.');
    }

    public function show($id)
    {
        $comment = Comments::findOrFail($id);
        return view('backend.comment.show', compact('comment'));
    }
}