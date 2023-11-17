<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ControllerUser extends Controller
{
    public function LoginView()
    {
        return view('fontend.login');
    }
    public function Login(Request $request)
    {
        $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back();
    }
    public function Register(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required|string',
        ]);

        $account = new Account();
        $account->save();
        $user = new User([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'id_account' => $account->id,
        ]);
        if ($user->save()) {

            return redirect("login")->withSuccess('Register success. Please login!');
        }
        return back();
    }
    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
