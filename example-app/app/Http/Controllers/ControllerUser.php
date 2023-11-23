<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function register(Request $request)
    {
        $request->validate([
           
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|confirmed|min:8|max:16',
            'password_confirmation' => 'required|string',
        ]);
    
        $account = new Account();
        $account->save();
    
        $user = new User([
           
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'id_account' => $account->id,
        ]);
    
        if ($user->save()) {
            return redirect("login")->withSuccess('Register success. Please login!');
        }
    
        return back()->withErrors('Registration failed. Please try again.');
    }
    public function show(string $id)
    {
        $user = User::with('account')->find($id);
        return view('backend.user.profile', compact('user'));
    }
}
