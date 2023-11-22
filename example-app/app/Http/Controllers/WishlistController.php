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
        $wishlistProducts = $user->wishlistProducts;
        return view('fontend.wishlist', [
            'wishlistProducts' => $wishlistProducts,
        ]);
    }

    public function addToWishlist(Request $request, Product $product)
    {
        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        return back()->with('success', 'This product was added to wishlist!');
    }

    public function removeFromWishlist(Request $request, Product $product)
    {
        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->delete();

        return back()->with('success', 'This product was removed from wishlist!!');
    }
}
