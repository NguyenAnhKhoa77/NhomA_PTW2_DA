<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Comments;
use App\Models\Product;

class ControllerDetail extends Controller
{
    public function index($id)
    {
        //Chưa xử lý ngoại lệ
        $newId = decrypt($id);
        if ($data = Product::find($newId)) {
            $allData = Product::where('categories_id', 'like', '%' . $data->categories_id . '%')->take(6)->get();
            $allComment = Comments::where('product_id', 'like', $newId)->get();
            return view('fontend.product', ['product' => $data], compact('allData', 'allComment'));
        } else {
            return view('fontend.404');
        }
    }
}
