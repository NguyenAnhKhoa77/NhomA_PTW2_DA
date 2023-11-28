<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerCheckOut extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            if (!session('cart')) {
                return redirect()->route('cart')->with('error', 'You did not had any product in cart!');
            }
            $cart = $request->session()->get('cart', []);

            $checkOutProducts = [];
            $subTotalPrices = 0;
            $totalShippingFees = 0;
            foreach ($cart as $cartItem) {
                $product = Product::find($cartItem['id']);
                if ($product) {
                    $product->quantityInCart = $cartItem['quantity'];
                    $checkOutProducts[] = $product;
                    $prices = $product->quantityInCart * $product->price;
                    $subTotalPrices += $prices;
                    $totalShippingFees += $product->quantityInCart * 10000;
                }
            }
            if ($subTotalPrices > 1000000) {
                $totalShippingFees = 0;
            } else if ($subTotalPrices > 500000) {
                $totalShippingFees = $totalShippingFees - $totalShippingFees * 0.1;
            }

            $totalPrices = $subTotalPrices + $totalShippingFees;
            return view('fontend.checkout', compact('checkOutProducts', 'subTotalPrices', 'totalShippingFees', 'totalPrices'));
        } else {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }
    }

    public function processCheckout(Request $request)
    {
        // Validate thông tin thanh toán từ $request
        $request->validate([
            'address' => 'required|string',
            'shipping' => 'required|integer',
            'total' => 'required|integer',
            'phone' => 'required|string',
            'payment_type' => 'required|in:0,1',
        ]);
        if (!session('cart')) {
            return redirect()->route('cart')->with('error', 'You did not had any product in cart!');
        }
        // Tạo một hóa đơn mới
        $bill = new Bills();
        $bill->user_id = auth()->id();
        $bill->address = $request->input('address');
        $bill->shipping = $request->input('shipping');
        $bill->total = $request->input('total');
        $bill->phone = $request->input('phone');
        $bill->status = 'pending';
        $bill->payment_type = $request->input('payment_type');

        if ($bill->save()) {
            // Thêm các sản phẩm vào đơn hàng và ghi lại số lượng sản phẩm
            $cart = $request->session()->get('cart', []);
            foreach ($cart as $cartItem) {
                $order = new Orders();
                $order->bill_id = $bill->id;
                $order->product_id = $cartItem['id'];
                $order->quantity = $cartItem['quantity'];
                $order->save();
                if (!$order->save()) {
                    return redirect()->back() - with('error', 'Could not check out!');
                }
            }
            session()->forget('cart');
            return redirect()->route('cart')->with('success', 'Checkout succeed!');
        }
        return redirect()->route('cart')->with('error', 'Could not check out!');
    }
}
