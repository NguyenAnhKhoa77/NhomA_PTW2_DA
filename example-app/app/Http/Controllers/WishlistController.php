<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $user = User::with('wishlistProducts')->find($userId);
        $wishlistProducts = null;
        if ($user) {
            $wishlistProducts = $user->wishlistProducts;
        }
        return view('fontend.wishlist', [
            'wishlistProducts' => $wishlistProducts,
        ]);
    }

    public function addToWishlist(Request $request)
    {
        $wishlist = Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);

        return back()->with('success', 'Sản phẩm đã được thêm vào Wishlist!');
    }

    public function removeFromWishlist(Request $request)
    {
        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->delete();

        return back()->with('success', 'Sản phẩm đã được xóa khỏi Wishlist!');
    }
}
