<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
class ControllerUsersManager extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Lấy những tài khoản không phải addmin và phân trang
        $users = User::where('is_admin', false)->with('account')->paginate(10);
        return view('backend.user.table', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|unique:users,email',
                'image' =>  'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/user/'), $imageName);

            $account = new Account([
                'name' => $request['name'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'avatar' => $imageName,
            ]);
            $account->save();
            //
            $user = new User();
            $user->email = $request->email;
            $user->password = bcrypt(123);
            $user->id_account = $account->id;
            $user->is_admin = 0;
            $user->save();

            // Lấy người dùng vừa tạo
            $newUser = User::find($user->id);

            // Cập nhật id_account của người dùng
            $newUser->id_account = $newUser->id;
            $newUser->save();
            return redirect()->route('user.table')->with('success', 'Thêm người dùng thành công');
        } else {
            abort('404');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('backend.user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Account::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
{
    $user = Account::findOrFail($id);
        $request->validate([
            'name' => 'required|string|min:2|regex:/^[^\s]+(\s[^\s]+)*$/',
    'phone' => 'required|regex:/^0[0-9]{9}$/',
    'address' => 'required|string|min:2',
    'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id), // Unique, ngoại trừ user hiện tại
            ],
            'password' => 'nullable|string|min:8', // Có thể thay đổi các quy tắc validate cho password
            // Thêm các quy tắc validate cho các trường khác nếu cần
        ]);

            $user->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->storeAs('avatars', $user->id . '.' . $avatar->getClientOriginalExtension(), 'public');
            $user->update(['avatar' => $avatarPath]);
        }

        return redirect()->route('users.edit', $user)->with('success', 'User information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->back()->with('errors', 'Account does not exist!');
        }
        $user = User::find($id);

        if ($account = Account::find($user->id_account)) {
            $account = Account::find($user->id_account);
            $path = "images/user/" . $account->avatar;
            if (File::exists($path)) {
                File::delete($path);
            }
            $account->delete();
        }
        if ($user->delete()) {
            return redirect()->back()->with('success', 'Delete account succeed!');
        }
        return redirect()->back();
    }
}
