<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        // Lấy danh sách 4 sản phẩm (điều chỉnh điều kiện lấy sản phẩm theo nhu cầu của bạn)
        $products = Product::take(4)->get();

        // Tạo đánh giá giả mạo cho mỗi sản phẩm
        foreach ($products as $product) {
            // Thêm 2 đánh giá cho mỗi sản phẩm
            for ($i = 1; $i <= 2; $i++) {
                Review::create([
                    'user_id' => $i, // ID của người dùng (tùy thuộc vào cách bạn tổ chức dữ liệu người dùng)
                    'product_id' => $product->id,
                    'rating' => rand(3, 5), // Điểm đánh giá ngẫu nhiên từ 3 đến 5
                    'comment' => "Đánh giá $i cho sản phẩm $product->name.",
                ]);
            }
        }

        // Hiển thị thông báo khi chạy Seeder thành công
        $this->command->info('Reviews seeded successfully.');
    }
}
