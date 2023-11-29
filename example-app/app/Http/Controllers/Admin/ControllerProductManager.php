<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Manufacturers;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Product_Size;
use App\Models\ProductImage;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ControllerProductManager extends Controller
{
    public function table()
    {
        $products = Product::with('categories', 'manufacturer')->orderBy('created_at', 'desc')->paginate(10);
        $sizess = Size::all();
        return view('backend.product.table', compact('products', 'sizess'));
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
        }

        return back();
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
    public function edit_handle($token_id, Request $request)
    {

        $token = $request->input('_token');
        if (Session::has('_token') && Session::get('_token') === $token) {
            if (!$product = Product::where('unique_token', $token_id)->firstOrFail()) {
                return redirect()->route('product.table')->with('errors', 'Mã sản phẩm sai');
            }
            $product = Product::where('unique_token', $token_id)->firstOrFail();
            $request->validate([
                'name' => 'required|string|max:255',
                'image' =>  'image|mimes:png,jpg,jpeg|max:2048 ',
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
            $product->unique_token = Str::uuid()->toString();
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
                return redirect()->route('product.table')->with('success', 'Cập nhật thành công' . $token_id);
            }
            return back();
        } else {
            Session::put('_token', $token);
            return redirect()->route('product.table')->with('errors', 'Danh mục không tồn tại');
        }
    }
    //sản phẩm bán chạy
    public function bestSellingProducts()
    {
        // Lấy danh sách sản phẩm bán chạy
        $bestSellingProducts = Product::orderBy('sold_count', 'desc')->take(6)->get();
        dd($bestSellingProducts); // Kiểm tra dữ liệu ở đây

        return view('fontend.index', compact('bestSellingProducts'));
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
                $path = "images/products/" . $product->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $images = $product->images;
                foreach ($images as $image) {
                    $path = "images/products/" . $image->url;
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
                $product->delete();
                return redirect()->route('product.table')->with('success', 'Xóa thành công');
            } else {
                return redirect()->back()->with('errors', 'Xóa thất bại! Thuộc Bill tồn tại');
            }
        } else {
            return redirect()->route('product.table')->with('errors', 'Không tìm thấy sản phẩm!');
        }
    }

    public function size_create($id)
    {
        if ($product = Product::find($id)) {
            $sizes = Size::all();
            return view('backend.product.create_size', compact('product', 'sizes'));
        }
        return redirect()->route('product.table')->with('errors', 'Danh mục không tồn tại');
    }
    public function size_store(Request $request, $token_id)
    {
        $token = $request->input('_token');
        if (Session::has('_token') && Session::get('_token') === $token) {
            if ($product = Product::where('unique_token', $token_id)->firstOrFail()) {
                $selectedSizes = $request->input('sizes', []);
                foreach ($selectedSizes as $size) {
                    if (!Size::find($size)) {
                        return back()->with('errors', 'Sai mã Size');
                    }
                }
                $product->sizes()->sync($selectedSizes);

                return redirect()->route('product.view', $product->id)->with('success', 'Cập nhật size thành công');
            } else {
                return redirect()->route('product.table')->with('errors', 'Mã sản phẩm sai');
            }
        }
    }
    public function view($id)
    {
        if ($product = Product::find($id)) {
            $images = ProductImage::where('product_id', $product->id)->get();
            return view('backend.product.detail', compact('product', 'images'));
        } else {
            return redirect()->route('product.table')->with('errors', 'Không tìm thấy danh mục');
        }
    }
    public function image_create(Request $request, $id)
    {
        if ($product = Product::find($id)) {
            return view('backend.product.image.create', compact('product'));
        } else {
            return redirect()->route('product.table')->with('errors', 'Không tìm thấy sản phẩm');
        }
    }
    public function image_store(Request $request, $id)
    {
        $token = $request->input('_token');
        if (Session::has('_token') && Session::get('_token') == $token) {
            if ($product = Product::find($id)) {
                $request->validate([
                    'images.*' => 'required|image|mimes:png,jpg,jpeg|max:2048'
                ]);
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $file) {
                        $name = uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images/products'), $name);
                        $productImage = new ProductImage([
                            'url' => $name,
                            'product_id' => $product->id,
                        ]);
                        $productImage->save();
                    }
                    return redirect()->route('product.view', $product->id)->with('success', 'Thêm ảnh thành công thành công');
                } else {
                    return redirect()->route('product.view', $product->id)->with('errors', 'Không thành công');
                }
            } else {
                return redirect()->route('product.table')->with('errors', 'Không tìm thấy sản phẩm');
            }
        }
    }
    public function image_destroy(Request $request, $id)
    {
        $token = $request->input('_token');
        if (Session::has('_token') && Session::get('_token') === $token) {
            if ($product = Product::find($request['id_pro'])) {

                if ($image = ProductImage::find($id)) {
                    $imageExists = $product->images()->where('id', $id)->exists();
                    if ($imageExists) {
                        $path = "images/products/" . $image->url;
                        if (File::exists($path)) {
                            File::delete($path);
                        }
                        if ($image->delete()) {
                            return redirect()->route('product.view', $product->id)->with('success', 'Xóa ảnh thành công!');
                        } else {
                            return back()->with('errors', 'Không thể xóa ảnh!');
                        }
                    } else {
                        return back()->with('errors', 'Ảnh không thuộc sản phẩm!');
                    }
                } else {
                    return back()->with('errors', 'Không tìm được image!');
                }
            } else {
                return redirect()->route('product.table')->with('errors', 'Không tìm thấy product!');
            }
        }
    }
}
