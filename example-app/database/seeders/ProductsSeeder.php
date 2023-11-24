<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Áo bóng đá 🔥 Bộ HOA SEN ADIDAS',
            'image' => 'd28dcb68357eef558e44be2705677f45.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 30000,
            'manufacturer_id' => 1,
            'categories_id' => 5,
            'unique_token' => '1',
            'sex' => 1,
            'inventory' => 10,
        ]);

        DB::table('products')->insert([
            'name' => 'Bộ Quần Áo Thể Thao Nam Chất Nỉ CottonCao',
            'image' => 'vn-11134207-7r98o-lkuihpjidmpn2a.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 200000,
            'manufacturer_id' => 2,
            'categories_id' => 2,
            'unique_token' => '2',
            'sex' => 1,
            'inventory' => 10,
        ]);

        DB::table('products')->insert([
            'name' => 'BỘ QUẦN ÁO THỂ THAO NỮ',
            'image' => '436845a322df0db209f11dceb550018a_tn.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 100000,
            'manufacturer_id' => 3,
            'categories_id' => 5,
            'unique_token' => '3',
            'sex' => 2,
            'inventory' => 10,
        ]);

        DB::table('products')->insert([
            'name' => 'CHÂN VÁY TENNIS 2 LỚP CAO CẤP',
            'image' => 'vn-11134201-23030-skss6gebomovff.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 500000,
            'manufacturer_id' => 3,
            'categories_id' => 6,
            'unique_token' => '4',
            'sex' => 1,
            'inventory' => 10,
        ]);

        DB::table('products')->insert([
            'name' => 'BỘ QUẦN ÁO THỂ THAO - CLB PSG',
            'image' => 'vn-11134207-7qukw-lhvg35yxvh6p7a.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 300000,
            'manufacturer_id' => 1,
            'categories_id' => 5,
            'unique_token' => '5',
            'sex' => 1,
            'inventory' => 10,
        ]);

        DB::table('products')->insert([
            'name' => 'Bộ phụ kiện dung cụ xoay balisong',
            'image' => 'vn-11134207-7r98o-llvvqgewbtgfa0.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 30000,
            'manufacturer_id' => 4,
            'categories_id' => 6,
            'unique_token' => '6',
            'sex' => 1,
            'inventory' => 10,
        ]);

        DB::table('products')->insert([
            'name' => 'Dây Nhảy Thể Dục Và Đai Bảo Vệ Hỗ Trợ Khắc Phục Gù Lưng Cao Cấp',
            'image' => 'vn-11134207-7r98o-lmygi7di90wvec_tn.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 30000,
            'manufacturer_id' => 3,
            'categories_id' => 6,
            'unique_token' => '7',
            'sex' => 3,
            'inventory' => 10,
        ]);

        DB::table('products')->insert([
            'name' => 'Băng Bảo Vệ Đầu Gối LI-NING Chính Hãng Đệm Đầu Gối',
            'image' => 'vn-11134207-7r98o-llnl6mh9q3in2b.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 30000,
            'manufacturer_id' => 5,
            'categories_id' => 6,
            'unique_token' => '8',
            'sex' => 3,
            'inventory' => 10,
        ]);



        DB::table('products')->insert([
            'name' => 'Bộ Đồ Tập Thể Thao Nữ ',
            'image' => '89d864e2f43c43f72850a65221ec3508.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 220000,
            'manufacturer_id' => 5,
            'categories_id' => 6,
            'unique_token' => '9',
            'sex' => 2,
            'inventory' => 10,
        ]);
        DB::table('products')->insert([
            'name' => 'Bộ quần áo bóng đá, đồ đá banh, bộ đồ thể thao Bulbal Vingar',
            'image' => 'vn-11134207-7qukw-livd2dfyxafg26.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 30000,
            'manufacturer_id' => 5,
            'categories_id' => 5,
            'unique_token' => '10',
            'sex' => 3,
            'inventory' => 10,
        ]);
        DB::table('products')->insert([
            'name' => 'Bộ đồ thể thao Gladimax S-Genmax Phối Lưới',
            'image' => 'de74d4d0c3edbe5e2ab38995daec8c1c.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 298000,
            'manufacturer_id' => 3,
            'categories_id' => 5,
            'unique_token' => '14',
            'sex' => 2,
            'inventory' => 10,
        ]);
        DB::table('products')->insert([
            'name' => 'Bộ đồ thể thao nam trơn',
            'image' => 'c69d20ab6ce5684e8873a019843fa6b8.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 30000,
            'manufacturer_id' => 5,
            'categories_id' => 6,
            'unique_token' => '11',
            'sex' => 1,
            'inventory' => 10,
        ]);
        DB::table('products')->insert([
            'name' => 'Bộ đá bóng in tên - Bộ quần áo đá bóng Việt Nam trắng thun lạnh cao cấ',
            'image' => 'sg-11134201-7rbk0-lkp7y9tej1ps85.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 30000,
            'manufacturer_id' => 5,
            'categories_id' => 4,
            'unique_token' => '12',
            'sex' => 3,
            'inventory' => 10,
        ]);
    }
}
