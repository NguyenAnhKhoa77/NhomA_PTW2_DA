<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Manufacturers;
use App\Models\Product;
use Illuminate\Http\Request;

class ControllerProductManager extends Controller
{
    public function table()
    {
        $products = Product::with('categories', 'manufacturer')->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.product.table', compact('products'));
    }
    public function create()
    {
        $manus = Manufacturers::all();
        $cates = Categories::all();
        return view('backend.product.create', compact('manus', 'cates'));
    }
    public function create_handler(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' =>  'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $product = new Product([
            'name' => $request['name'],
            'image' => $imageName,
            'categories_id' => $request['cate'],
            'manufacturer_id' => $request['manu'],
            'description' => $request['description'],
            'price' => $request['price'],
        ]);
        if ($product->save()) {
            $image->move(public_path('images'), $imageName);
            return redirect()->route('product.table');
        }
        return back();
    }
    public function edit()
    {
        return view('backend.product.edit');
    }
    public function delete()
    {
    }
}
