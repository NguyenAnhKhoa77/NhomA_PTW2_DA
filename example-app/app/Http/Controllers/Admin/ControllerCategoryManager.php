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
    public function index(Request $request)
    {
        $query = Categories::query();

        if ($request->submit == 2) {
            // Sắp xếp
            $sortOrder = $request->sort == 2 ? 'desc' : 'asc';
            $query->orderBy('name', $sortOrder);
        }
        if ($request->submit == 1) {
            // Tìm kiếm
            $keyword = $request->keyword;
            $query->when($keyword, function ($q) use ($keyword) {
                return $q->where('name', 'like', "%$keyword%");
            });
        }

        $categories = $query->paginate(10);

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
        ]);

        $cate = new Categories([
            'name' => $request['name'],
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

        if (!$cate = Categories::find($id)) {
            return redirect()->route('category.table')->with('errors', 'Danh mục không tồn tại');
        }
        $category = Categories::find($id);
        $page = 'Manufacter edit';
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if (!$cate = Categories::find($id)) {
            return redirect()->route('category.table')->with('errors', 'Danh mục không tồn tại');
        }
        $cate = Categories::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $cate->name = $request->input('name');
        if ($cate->save()) {

            return redirect()->route('category.table')->with('success', 'Cập nhật thành công');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Categories::find($id);
        if (!$cate) {
            return redirect()->route('category.table')->with('error', 'Category does not exist!');
        }
        $product = Product::where('categories_id', $id)->get();
        if ($product->count() == 0) {
            $cate->delete();
            //Quay lại trang trước đó
            return redirect()->route('category.table')->withSuccess('Category was deleted!');
        } else {
            return redirect()->route('category.table')->with('error', 'Cannot delete this category!');
        }
    }
}
