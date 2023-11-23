<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Manufacturers;
use Illuminate\Support\Facades\DB;

class ControllerView extends Controller
{
    public function Home()
    {
        $productsNew = Product::where('updated_at', '>=', DB::raw('CURDATE() - INTERVAL DAYOFWEEK(CURDATE()) + 6 DAY'))
            ->orderBy('updated_at', 'DESC')
            ->limit(6)
            ->get();
        $products = Product::with('sex')->take(6)->get();
        return view('fontend.index', compact('products', 'productsNew'));
    }

    public function grid()
    {
        return view('fontend.grid');
    }
    public function product($id)
    {
        $data = Product::find($id);
        $allData = Product::where('categories_id', 'like', '%' . $data->categories_id . '%')->take(6)->get();
        return view('fontend.product', ['product' => $data], compact('allData'));
    }
    public function account()
    {
        return view('fontend.account');
    }
    public function checkout()
    {
        return view('fontend.checkout');
    }
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
    public function contact()
    {
        return view('fontend.contact');
    }
    public function contactForm()
    {
        $contact = new Contact();
        $contact->name = request('name');
        $contact->email = request('email');
        $contact->msg = request('msg');
        $contact->save();
        return redirect()->back();
    }

    public function getSearch(Request $req)
    {
        $key = $req->key;

        if (!$key) {
            // Xử lý khi khóa tìm kiếm trống
            // Ví dụ: chuyển hướng đến trang mặc định hoặc hiển thị thông báo lỗi
            return redirect()->route('fontend.black');
        }
        $products = Product::where('name', 'like', '%' . $key . '%')->take(6)->get();

        return view('fontend.search', compact('products'));
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
}
