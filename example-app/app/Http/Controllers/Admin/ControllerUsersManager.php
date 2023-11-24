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
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
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

        // Lấy người dùng từ ID
        $user = User::find($id);

        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            return redirect()->back()->with('error', 'Người dùng không tồn tại');
        }
        // Kiểm tra xem có mật khẩu được cung cấp hay không
        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->input('password'));
        }
        // Cập nhật thông tin trong bảng người dùng
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), // Đảm bảo mã hóa mật khẩu
        ]);

        // Cập nhật thông tin trong bảng tài khoản
        $user->account->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'), // Thêm các trường khác nếu cần
        ]);

        return redirect()->route('user.table', ['id' => $user->id])->with('success', 'Cập nhật thông tin thành công');
    }

    /**
     * Update the specified resource in storage.
     */


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
    public function changepass()
    {
    }
}
