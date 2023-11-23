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
    public function search(Request $request)
    {
        $products = Product::query();
        if ($request->has('name')) {
            $products->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->has('sex')) {
            $products->where('sex' . $request->sex);
        }
        if ($request->has('categories_id')) {
            $products->where('categories_id' . $request->categories_id);
        }
        if ($request->has('manufacturer_id')) {
            $products->where('manufacturer_id' . $request->categories_id);
        }
        if ($request->has('price_max')) {
            $products->where('price', '>=', $request->price_max);
        }

        if ($request->has('price_min')) {
            $products->where('price', '<=', $request->price_min);
        }
        $productsAllCount = $products->count();
        $products = $products->paginate(9);

        return view('fontend.grid', compact('products', 'productsAllCount'));
    }
}
