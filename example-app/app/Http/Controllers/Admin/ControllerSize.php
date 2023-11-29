<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControllerSize extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::all();
        return view('backend.size.table', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $token = $request->input('_token');

        if (Session::has('_token') && Session::get('_token') === $token) {
            $request->validate([
                'name' => 'required|string|max:250|unique:sizes,name',
            ]);
        }
        $size = new Size([
            'name' => $request['name'],
        ]);
        if ($size->save()) {
            return redirect()->route('size.table')->with('success', 'Thêm thành công!');
        }
        Session::put('_token', $token);
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
        //
    }
}
