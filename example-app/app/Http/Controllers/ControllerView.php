<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ControllerView extends Controller
{
    public function Home()
    {


        $products = Product::with('sex')->take(6)->get();
        return view('fontend.index', compact('products'));
    }

    public function grid()
    {
        return view('fontend.grid');
    }
    public function product()
    {
        return view('fontend.product');
    }
    public function account()
    {
        return view('fontend.account');
    }
    public function checkout()
    {
        return view('fontend.checkout');
    }
    public function cart()
    {
        return view('fontend.cart');
    }

    public function notFound()
    {
        return view('fontend.404');
    }
    public function getSearch(Request $req)
    {
        $key = $req->key;

        if (!$key) {
            // Xử lý khi khóa tìm kiếm trống
            // Ví dụ: chuyển hướng đến trang mặc định hoặc hiển thị thông báo lỗi
            return redirect()->route('fontend.black');
        }

        $products = Product::where('name', 'like', '%' . $key . '%')->take(6)->get();
        //done r ă sếp
        return view('fontend.search', compact('products'));
    }
}
