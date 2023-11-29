<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Address;
use App\Models\Bills;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use App\Models\Mails;
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
        $addresses = Address::all();
        return view('fontend.account.address', compact('addresses'));
    }

    public function addressAddNew()
    {
        return view('fontend.account.address-addnew');
    }

    public function addressAddNewProcess(Request $request)
    {
        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'street_address' => 'required|max:255',
            'is_default' => 'required|in:0,1',
        ]);
        $userAddresses = Address::all();

        if (count($userAddresses) == 0) {
            $address = new Address();
            $address->user_id = Auth::id();
            $address->fullname = $request->fullname;
            $address->phone = $request->phone;
            $address->street_address = $request->street_address;
            $address->is_default = 1;
        } else {
            if ($request->is_default == 1) {
                $addressOld = new Address();
                foreach ($userAddresses as $userAddress) {
                    $addressOld = Address::find($userAddress->id);
                    if ($addressOld->is_default == 1) {
                        $addressOld->is_default = 0;
                        $addressOld->update();
                    }
                }
            }
            $address = new Address();
            $address->user_id = Auth::id();
            $address->fullname = $request->fullname;
            $address->phone = $request->phone;
            $address->street_address = $request->street_address;
            $address->is_default = $request->is_default;
        }
        if ($address->save()) {
            return redirect()->route('address')->with('status', 'Add new address succeed!');
        } else {
            return redirect()->back()->with('status', 'Add failed!');
        }
    }

    public function addressChange(Request $request, Address $address)
    {
        return view('fontend.account.address-change', compact('address'));
    }

    public function addressChangeProcess(Request $request, Address $address)
    {
        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'street_address' => 'required|max:255',
            'is_default_old' => 'required|in:0,1',
            'is_default' => 'in:0,1',
        ]);
        $userAddresses = Address::all();
        if ($request->is_default == "1") {
            $addressOld = new Address();
            foreach ($userAddresses as $userAddress) {
                $addressOld = Address::find($userAddress->id);
                if ($addressOld->is_default == 1) {
                    $addressOld->is_default = 0;
                    $addressOld->update();
                }
            }
            $address = Address::findOrFail($address->id);
            $address->fullname = $request->fullname;
            $address->phone = $request->phone;
            $address->street_address = $request->street_address;
            $address->is_default = $request->is_default;

            if ($address->update()) {
                return redirect()->route('address')->with('status', 'Update address succeed!');
            } else {
                return redirect()->back()->with('status', 'Update failed!');
            }
        } else {
            $address = Address::findOrFail($address->id);
            $address->fullname = $request->fullname;
            $address->phone = $request->phone;
            $address->street_address = $request->street_address;
            $address->is_default = $request->is_default_old;

            if ($address->update()) {
                return redirect()->route('address')->with('status', 'Update address succeed!');
            } else {
                return redirect()->back()->with('status', 'Update failed!');
            }
        }
    }

    public function addressDeleteProcess(Request $request, Address $address)
    {
        $userAddress = Address::findOrFail($address->id);
        if ($userAddress->is_default == 1) {
            return redirect()->back()->with('error', 'Cannot delete default address!');
        }
        if ($userAddress->delete()) {
            return redirect()->back()->with('success', 'Delete address succeed!');
        }
        return redirect()->back()->with('error', 'Cannot delete!');
    }

    public function setAddressDefaultProcess(Request $request, Address $address)
    {
        $userAddresses = Address::all();

        $addressOld = new Address();
        foreach ($userAddresses as $userAddress) {
            $addressOld = Address::find($userAddress->id);
            if ($addressOld->is_default == 1) {
                $addressOld->is_default = 0;
                $addressOld->update();
            }
        }
        $address = Address::findOrFail($address->id);
        $address->is_default = 1;

        if ($address->update()) {
            return redirect()->route('address')->with('status', 'Update default address succeed!');
        } else {
            return redirect()->back()->with('status', 'Update failed!');
        }
    }

    public function ordersPending()
    {
        $ordersPending = Bills::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('fontend.account.order.order-pending', compact('ordersPending'));
    }

    public function ordersDelivering()
    {
        $ordersDelivering = Bills::where('status', 'delivering')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('fontend.account.order.order-delivering', compact('ordersDelivering'));
    }

    public function ordersDelivered()
    {
        $ordersDelivered = Bills::where('status', 'delivered')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('fontend.account.order.order-delivered', compact('ordersDelivered'));
    }

    public function ordersCompleted()
    {
        $ordersCompleted = Bills::where('status', 'completed')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('fontend.account.order.order-completed', compact('ordersCompleted'));
    }

    public function ordersCancelled()
    {
        $ordersCancelled = Bills::where('status', 'cancelled')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('fontend.account.order.order-cancelled', compact('ordersCancelled'));
    }

    public function orderDetail(Request $request, Bills $bill)
    {
        $billCurrent = Bills::findOrFail($bill->id);
        if (!$billCurrent) {
            return redirect()->back()->with('error', "Fail to load order detail!");
        }
        return view('fontend.account.order.order-detail', compact('billCurrent'));
    }

    public function cancelOrderStatus(Request $request, Bills $bill)
    {
        $billCurrent = Bills::findOrFail($bill->id);
        if ($billCurrent) {
            if ($billCurrent->status == 'pending') {
                $billCurrent->status = "cancelled";
                $billCurrent->update();
                return redirect()->back()->with('success', 'Cancel order succeed!');
            }
        }
        return redirect()->back()->with('error', 'Cancel order failed!');
    }

    public function acceptOrderStatus(Request $request, Bills $bill)
    {
        $billCurrent = Bills::findOrFail($bill->id);
        if ($billCurrent) {
            if ($billCurrent->status == 'delivered') {
                $billCurrent->status = "completed";
                $billCurrent->update();
                return redirect()->back()->with('success', 'Accept order succeed!');
            }
        }
        return redirect()->back()->with('error', 'Accept order failed!');
    }

    public function prePayOrderStatus(Request $request, Bills $bill)
    {
        $billCurrent = Bills::findOrFail($bill->id);
        if ($billCurrent) {
            $orders = Orders::where('bill_id', $billCurrent->id)->get();
            foreach ($orders as $order) {
                $product = Product::where('id', $order->product_id)->get();
                $cart = $request->session()->get('cart', []);

                $quantity = $order->quantity; // Lấy giá trị số lượng từ form, mặc định là 1 nếu không có
                $key = array_search($product[0]->id, array_column($cart, 'id'));

                if ($key !== false && isset($cart[$key]['quantity'])) {
                    // Sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
                    $cart[$key]['quantity'] += $quantity;
                } else {
                    // Sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
                    $product = Product::findOrFail($product[0]->id);
                    $cart[] = [
                        'id' => $product->id,
                        'quantity' => $quantity,
                        'name' => $product->name,
                        'image' => $product->image,
                        'price' => $product->price,
                    ];
                }
                $request->session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Products in order were added to cart.');
        }
        return redirect()->back()->with('error', 'Pre-pay order failed!');
    }

    public function mailbox()
    {
        $mails = Mails::all();
        return view('fontend.account.mailbox',compact('mails'));
    }

    public function maildetail($id){
        $mail = Mails::find($id);
        return view('fontend.account.mail-detail',compact('mail'));
    }

    public function changePassword()
    {
        return view('fontend.account.change-password');
    }

    public function changePasswordProcess(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with("error", "Old password doesn't match!");
        }
        $user->$user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('status', 'Password was changed successfully!');
    }
}
