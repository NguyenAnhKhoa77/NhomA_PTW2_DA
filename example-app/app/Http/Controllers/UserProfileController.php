<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function index()
    {
        $userInfo = Account::findOrFail(auth()->user()->id);
        return view('fontend.account.profile', compact('userInfo'));
    }

    public function updateProfile(Request $request, Account $account)
    {
        $request->validate([
            'name' => [
                'required',
                'max:255',
            ],
            'phone' => [
                'required',
                'regex:/^0[0-9]{9}$/',
            ],
            'address' => [
                'required',
                'max:255',
            ],
            'avatar' => [
                'image',
                'max:2048',
            ],
        ]);
        $data = $request->all();
        $userInfo = $data;
        if ($request->file('avatar') != '') {
            $destinationPath = 'backend/img/';
            $userInfo['avatar'] = $request->file('avatar')->getClientOriginalName();
            $file_old = $destinationPath . $userInfo['avatar'];
            //code for remove old file
            if ($file_old != '' && $file_old != null) {

            } else {
                unlink($file_old);
            }

            //upload new file
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);

            //for update in table
        }
        $account->update($userInfo);
        return redirect()->back()->withSuccess('Change succeed!');
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
