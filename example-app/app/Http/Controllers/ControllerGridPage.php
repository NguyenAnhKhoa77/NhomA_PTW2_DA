<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ControllerGridPage extends Controller
{

    public function index()
    {
        $productsAllCount = Product::count();
        $products  = Product::orderBy('created_at', 'desc')->paginate(9);
        return view('fontend.grid', compact('products', 'productsAllCount'));
    }
}
