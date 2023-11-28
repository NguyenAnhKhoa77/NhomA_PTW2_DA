<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Comments;
use App\Models\Product;
use Exception;

class ControllerDetail extends Controller
{
    public function index($id)
    {
        try {
            $newId = decrypt($id);
        } catch (Exception $e) {
            return view('errors.404');
        };
        if ($data = Product::find($newId)) {
            $allData = Product::where('categories_id', 'like', '%' . $data->categories_id . '%')->take(6)->get();
            $allComment = Comments::where('product_id', 'like', $newId)->get();
            return view('fontend.product', ['product' => $data], compact('allData', 'allComment'));
        } else {
            return view('fontend.404');
        }
    }
}
