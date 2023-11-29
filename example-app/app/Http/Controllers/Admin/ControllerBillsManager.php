<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use App\Models\User;
use Illuminate\Http\Request;

class ControllerBillsManager extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bill = Bills::paginate(10);
        return view('backend.bills.table', compact('bill'));
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($bill = Bills::find($id)) {
            $user = User::find($bill->use_id);
            return view('backend.bills.detail', compact('bill', 'user'));
        } else {
            return redirect()->route('bill.table');
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
