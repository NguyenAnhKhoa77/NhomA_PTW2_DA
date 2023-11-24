<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class   ProductController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('key');

        $products = Product::where(function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%');
        })->paginate(5); // Số sản phẩm hiển thị trên mỗi trang

        return view('fontend.search', compact('products', 'keyword'));
    }

}
