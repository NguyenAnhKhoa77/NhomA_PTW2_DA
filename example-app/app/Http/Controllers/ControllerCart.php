<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerCart extends Controller
{
    public function cart(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        $products = [];
        foreach ($cart as $cartItem) {
            $product = Product::find($cartItem['id']);
            if ($product) {
                $product->quantityInCart = $cartItem['quantity'];
                $products[] = $product;
            }
        }

        return view('fontend.cart', compact('products'));
    }
    public function addToCart(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);

        $quantity = $request->input('qty', 1); // Lấy giá trị số lượng từ form, mặc định là 1 nếu không có
        $key = array_search($productId, array_column($cart, 'id'));

        if ($key !== false && isset($cart[$key]['quantity'])) {
            // Sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $cart[$key]['quantity'] += $quantity;
        } else {
            // Sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
            $product = Product::find($productId);
            $cart[] = [
                'id' => $productId,
                'quantity' => $quantity,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
            ];
        }
        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }
    public function updateCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        foreach ($request->input('quantities', []) as $item) {
            $productId = $item['productId'];
            $quantity = $item['quantity'];

            // Find the product in the cart and update its quantity
            foreach ($cart as &$product) {
                if ($product['id'] == $productId) {
                    $product['quantity'] = $quantity;
                    break;
                }
            }
        }

        $request->session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }
    public function removeFromCart(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);

        // Lọc ra các sản phẩm không phải là sản phẩm cần xóa
        $updatedCart = array_filter($cart, function ($item) use ($productId) {
            return $item['id'] != $productId;
        });

        $request->session()->put('cart', $updatedCart);

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
}
