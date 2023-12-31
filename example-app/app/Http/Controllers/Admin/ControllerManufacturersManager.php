<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manufacturers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ControllerManufacturersManager extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //bắt đầu câu truy vấn với query
        $query = Manufacturers::query();

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
        $manufacturer = $query->paginate(10);
        return view('backend.manufacturer.table', compact('manufacturer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tiến hành xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Có lỗi xảy ra khi xác thực dữ liệu.');
        }

        // Kiểm tra xem bản ghi đã tồn tại hay chưa
        $existingManufacturer = Manufacturers::where('name', $request->input('name'))->first();

        if ($existingManufacturer) {
            return back()->with('error', 'Nhãn hiệu đã tồn tại trong cơ sở dữ liệu.')->withInput();
        }

        // Tiếp tục xử lý và lưu bản ghi
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/manufacturers/'), $imageName);

        $manu = new Manufacturers([
            'name' => $request->input('name'),
            'image' => $imageName,
        ]);

        if ($manu->save()) {
            session()->flash('success', 'Thêm hãng thành công');
            return redirect()->route('manufacture.table');
        }

        return back()->with('error', 'Có lỗi xảy ra khi thêm hãng. Vui lòng thử lại.')->withInput();
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

        if (!$manufacturer = Manufacturers::find($id)) {
            return redirect()->route('manufacture.table')->with('errors', 'Danh mục không tồn tại');
        }
        $manufacturer = Manufacturers::find($id);
        return view('backend.manufacturer.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!$manu = Manufacturers::find($id)) {
            return redirect()->route('manufacture.table')->with('errors', 'Danh mục không tồn tại');
        }
        $manu = Manufacturers::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $manu->name = $request->input('name');
        if ($request->hasFile('image')) {
            $path = "images/manufacturers/" . $manu->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $manu->image = $imageName;
            $image->move(public_path('images/manufacturers/'), $imageName);
        }
        if ($manu->save()) {

            return redirect()->route('manufacture.table')->with('success', 'Cập nhật thành công');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$manufacturer = Manufacturers::find($id)) {
            return redirect()->back()->with('errors', 'Danh mục không tồn tại');
        }
        $product = Product::where('manufacturer_id', $id)->get();
        if ($product->count() == 0) {
            $manufacturer = Manufacturers::find($id);
            $path = "images/manufacturers/" . $manufacturer->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $manufacturer->delete();
            //Quay lại trang trước đó
            return redirect()->back()->with('success', 'Xóa danh mục thành công');
        } else {
            return redirect()->back()->with('errors', 'Không thể xóa danh mục vì vẫn còn sản phẩm');
        }
    }
}
