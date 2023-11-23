<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('fontend.account.profile');
    }

    public function address()
    {
        return view('fontend.account.address');
    }

    public function orders()
    {
        return view('fontend.account.orders');
    }

    public function changePassword()
    {
        return view('fontend.account.change-password');
    }

    public function changePasswordProcess(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:6|max:255',
            'new_password' => 'required|min:6|max:255|confirmed',
            'new_password_confirmation' => 'required|min:6|max:255',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with("error", "Old password doesn't match!");
        }
        $user->password = Hash::make($request->new_password);
        $user->update();

        return redirect()->back()->with('status', 'Password was changed successfully!');
    }
}
