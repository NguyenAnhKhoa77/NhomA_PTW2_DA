// Model ProductReview.php
class ProductReview extends Model
{
    protected $fillable = ['user_id', 'product_id', 'rating', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

// ProductReviewController.php
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
