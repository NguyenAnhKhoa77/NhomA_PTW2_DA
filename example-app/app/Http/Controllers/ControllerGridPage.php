<?php

namespace App\Http\Controllers;

use App\Models\PriceRange;
use App\Models\Product;
use Illuminate\Http\Request;

class ControllerGridPage extends Controller
{
    public function search(Request $request)
    {
        $products = Product::query();
        if ($request->has('name')) {
            $request->session()->flash('search_keyword', $request->input('name'));
            $products->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->has('category')) {
            $products->where('categories_id', $request->category);
        }
        if ($request->has('sex')) {
            $products->where('sex', $request->sex);
        }
        if ($request->has('pricerange')) {
            $price = PriceRange::find($request->pricerange);
            $products->where('price', '<=', $price->price_max);
            $products->where('price', '>=', $price->price_min);
        }

        $products = $products->orderBy('created_at', 'desc')->paginate(9);
        return view('fontend.grid', compact('products'));
    }
}
