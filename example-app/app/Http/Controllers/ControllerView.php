<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerView extends Controller
{
    public function Home()
    {
        return view('fontend.index');
    }
    public function login()
    {
        return view('fontend.login');
    }
    public function grid()
    {
        return view('fontend.grid');
    }
    public function product()
    {
        return view('fontend.product');
    }
    public function account()
    {
        return view('fontend.account');
    }
    public function checkout()
    {
        return view('fontend.checkout');
    }
    public function cart()
    {
        return view('fontend.cart');
    }
}