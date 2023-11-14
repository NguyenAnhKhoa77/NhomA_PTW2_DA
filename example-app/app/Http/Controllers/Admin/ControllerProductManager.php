<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerProductManager extends Controller
{

    public function create()
    {
        return view('backend.create');
    }
    public function detail()
    {
        return view('backend.project-detail');
    }
    public function edit()
    {
        return view('backend.project-edit');
    }
}
