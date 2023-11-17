<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ControllerCategoryManager extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Categories::latest()->paginate(10);
        return view('backend.category.table', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "Categories add";
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' =>  'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/category'), $imageName);

        $cate = new Categories([
            'name' => $request['name'],
            'image' => $imageName,
        ]);
        if ($cate->save()) {
            return redirect()->route('category.table')->with('success', 'Thêm hãng thành công');
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$cate = Categories::find($id)) {
            return redirect()->back()->with('errors', 'Danh mục không tồn tại');
        }
        $product = Product::where('categories_id', $id)->get();
        if ($product->count() == 0) {

            $cate = Categories::find($id);
            $path = "images/" . $cate->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $cate->delete();
            //Quay lại trang trước đó
            return redirect()->route('category.table')->with('success', 'Xóa danh mục thành công!');
        } else {
            return redirect()->back()->with('errors', 'Không thể xóa danh mục vì vẫn còn sản phẩm!');
        }
    }
}