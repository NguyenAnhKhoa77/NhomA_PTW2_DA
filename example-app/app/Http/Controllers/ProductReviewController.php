<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function store(Request $request, $productId)
{
    $request->validate([
        'rating' => 'required|integer|between:1,5',
        'comment' => 'nullable|string|max:255',
    ]);

    $review = new ProductReview([
        'user_id' => auth()->user()->id,
        'product_id' => $productId,
        'rating' => $request->input('rating'),
        'comment' => $request->input('comment'),
    ]);

    $review->save();

    return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi.');
}
}