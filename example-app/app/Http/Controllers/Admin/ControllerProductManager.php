<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Manufacturers;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

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

        $token = $request->input('_token');

        if (Session::has('_token') && Session::get('_token') === $token) {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' =>  'required|image|mimes:png,jpg,jpeg|max:5120 ',
                'description' => 'required',
                'price' => 'required|numeric|gt:0',
                'inventory' => 'required|numeric|gt:0',
                'manu' => 'required',
                'cate' => 'required',
            ]);
            if (!!!Categories::find($request['cate'])) {
                return back()->withErrors(['cate' => 'Category does not exist.']);
            }
            if (!!!Manufacturers::find($request['manu'])) {
                return back()->withErrors(['manu' => 'Manufacturer does not exist.']);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $product = new Product([
                'name' => $request['name'],
                'image' => $imageName,
                'categories_id' => $request['cate'],
                'manufacturer_id' => $request['manu'],
                'description' => $request['description'],
                'price' => $request['price'],
                'inventory' => $request['inventory'],
            ]);
            if ($product->save()) {
                $image->move(public_path('images/products'), $imageName);
                return redirect()->route('product.table')->with('success', 'Thêm sản phẩm thành công');
            }
            Session::put('token', $token);

            return back();
        } else {
        }
    }
    public function edit($id)
    {
        if (!!!$product = Product::find($id)) {
            return redirect()->route('product.table')->with('errors', 'Danh mục không tồn tại');
        }
        $product = Product::find($id);
        $manus = Manufacturers::all();
        $cates = Categories::all();
        $page = 'Product edit';
        return view('backend.product.edit', compact('product', 'page', 'cates', 'manus'));
    }
    public function edit_handle($id, Request $request)
    {


        $token = $request->input('_token');
        if (Session::has('_token') && Session::get('_token') === $token) {
            if (!!!$product = Product::find($id)) {
                return redirect()->route('product.table')->with('errors', 'Mã sản phẩm sai');
            }
            $product = Product::find($id);
            $request->validate([
                'name' => 'required|string|max:255',
                'image' =>  'image|mimes:png,jpg,jpeg|max:5120 ',
                'description' => 'required',
                'price' => 'required|numeric|gt:0',
                'inventory' => 'required|numeric|gt:0',
                'manu' => 'required',
                'cate' => 'required',
            ]);
            if (!!!Categories::find($request['cate'])) {
                return back()->withErrors(['cate' => 'Category does not exist.']);
            }
            if (!!!Manufacturers::find($request['manu'])) {
                return back()->withErrors(['manu' => 'Manufacturer does not exist.']);
            }
            $product->name = $request->input('name');
            $product->categories_id = $request->input('cate');
            $product->manufacturer_id = $request->input('manu');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->inventory = $request->input('inventory');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $path = "images/products/" . $product->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $image->move(public_path('images/products'), $imageName);
                $product->image = $imageName;
            }

            if ($product->save()) {
                return redirect()->route('product.table')->with('success', 'Cập nhật thành công' . $token);
            }
            return back();
        } else {
            Session::put('_token', $token);
            return redirect()->route('product.table')->with('errors', 'Danh mục không tồn tại');
        }
    }

    //xóa  sản phẩm:
    public function delete(Request $request)
    {
        $token = $request->input('_token');
        if (Session::has('_token') && Session::get('_token') === $token) {
            $id = $request['id'];
            if (!$product = Product::find($id)) {
                return redirect()->back()->with('errors', 'Product does not exist!');
            }
            $oders = Orders::where('product_id', $id)->get();
            if ($oders->count() == 0) {
                $product = Product::find($id);
                $path = "images/" . $product->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $product->delete();
            return redirect()->route('product.table')->with('success', 'Xóa thành công');
            } else {
                return redirect()->back()->with('errors', 'Cannot delete product!');
            }
        } else {
            return redirect()->route('product.table')->with('error', 'Không tìm thấy sản phẩm!');
        }
    }
}