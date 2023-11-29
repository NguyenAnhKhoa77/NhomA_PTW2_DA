<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControllerCoupons extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupons::all();
        return view('backend.coupons.table', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $token = $request->input('_token');
        if (Session::has('_token') && Session::get('_token') === $token) {
            $request->validate([
                'code' => 'required|string|min:5|max:250|unique:coupons,code',
                'discount_percent' => 'required|integer|between:0,100',
                'expiration_date' => 'required|date|after_or_equal:today',
            ]);
            $coupon = new Coupons([
                'code' => $request['code'],
                'discount_percent' => $request['discount_percent'],
                'expiration_date' => $request['expiration_date'],
            ]);
            if ($coupon->save()) {
                return redirect()->route('coupons.table')->with('success', 'Lưu phiếu giảm giá thành công!');
            } else {
                return redirect()->route('coupons.table')->with('errors', 'Không thể lưu!');
            }
        }
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
