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
use Illuminate\Support\Str;


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
                'image' =>  'required|image|mimes:png,jpg,jpeg|max:2048 ',
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
                'unique_token' => Str::uuid()->toString(),
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
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.table')->with('errors', 'Danh mục không tồn tại');
        }

        $manus = Manufacturers::all();
        $cates = Categories::all();
        $page = 'Product edit';

        return view('backend.product.edit', compact('product', 'page', 'cates', 'manus'));
    }

    public function edit_handle($id, Request $request)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.table')->with('errors', 'Danh mục không tồn tại');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'image' =>  'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required|max:2048',
            'price' => 'required|numeric|gt:0',
            'cate' => 'required', // Thêm validation cho 'cate'
            'manu' => 'required', // Thêm validation cho 'manu'
        ]);

        $product->name = $request->input('name');
        $product->categories_id = $request->input('cate');
        $product->manufacturer_id = $request->input('manu');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            // Kiểm tra và xóa hình ảnh cũ
            $oldImagePath = public_path('images/products/' . $product->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Tiếp tục xử lý hình ảnh mới
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }

        if ($product->save()) {
            return redirect()->route('product.table')->with('success', 'Cập nhật thành công');
        }

        return redirect()->back()->withErrors('Có lỗi xảy ra. Vui lòng thử lại.');
    }


    //xóa  sản phẩm:
    public function delete(Request $request)
    {
        $token = $request->input('_token');
        if (Session::has('_token') && Session::get('_token') === $token) {
            $id = $request['id'];
            if (!$product = Product::find($id)) {
                return redirect()->back()->with('errors', 'Sản phẩm không tồn tại!');
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
                return redirect()->back()->with('errors', 'Xóa thất bại!');
            }
        } else {
            return redirect()->route('product.table')->with('error', 'Không tìm thấy sản phẩm!');
        }
    }
}
