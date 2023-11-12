<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerView extends Controller
{
    public function Home()
    {
        return view('fontend.index');
    }
}