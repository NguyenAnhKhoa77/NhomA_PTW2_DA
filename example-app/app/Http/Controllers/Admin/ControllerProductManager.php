<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerProductManager extends Controller
{
    public function table()
    {
        return view('backend.product.table');
    }
    public function create()
    {
        return view('backend.product.edit');
    }
    public function view()
    {
        return view('backend.product.view');
    }
    public function edit()
    {
        return view('backend.product.edit');
    }
    public function delete()
    {
    }
}
