<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Manufacturers;
use App\Models\PriceRange;
use App\Models\Product;
use App\Models\sex;
use Illuminate\Http\Request;

class ControllerGridPage extends Controller
{

    public function index()
    {
        $categories = Categories::all();
        $priceranges = PriceRange::all();
        $productsAllCount = Product::count();
        $manufacturers = Manufacturers::all();
        $sexs = sex::all();
        $products  = Product::orderBy('created_at', 'desc')->paginate(9);
        return view('fontend.grid', compact('products', 'categories', 'manufacturers', 'priceranges', 'sexs'));
    }
    public function search(Request $request)
    {
        $products = Product::query();
        if ($request->has('name')) {
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

        $sexs = sex::all();
        $products = $products->orderBy('created_at', 'desc')->paginate(9);
        $categories = Categories::all();
        $priceranges = PriceRange::all();
        $manufacturers = Manufacturers::all();
        return view('fontend.grid', compact('products', 'categories', 'manufacturers', 'priceranges', 'sexs'));
    }
}
