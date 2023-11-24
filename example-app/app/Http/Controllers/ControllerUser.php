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
        $credentials  =  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $userId = Auth::user()->id;
            session()->put('user_id', $userId);
            return redirect()->route('home');
        } else {
            return back()->with('error', 'Email hoặc mật khẩu không đúng.');
        }
    }
    public function RegisterView()
    {
        return view('fontend.register');
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
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'id_account' => $account->id,
        ]);
        if ($user->save()) {
            return redirect()->route('login')->withSuccess('Register success. Please login!');
        }
        $account->delete();
        return back();
    }
    public function Logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        $request->session()->invalidate(); // Invalidates the session

        $request->session()->regenerateToken(); // Regenerates the CSRF token

        return redirect()->route('login.view');
    }
}
