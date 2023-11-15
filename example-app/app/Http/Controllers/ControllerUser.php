<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerUser extends Controller
{
    public function LoginView()
    {
        return view('fontend.login');
    }
    public function Login()
    {
    }
    public function Register()
    {
        return view('fontend.login');
    }
}
