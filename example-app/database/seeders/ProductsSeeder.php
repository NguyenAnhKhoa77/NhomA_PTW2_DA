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
            'name' => 'BỘ ARSENAL - QUẦN ÁO THỂ THAO LONG THANH',
            'image' => '11134207.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 27.000,
            'manufacturer_id' => 1,
            'categories_id' => 5,
            'sex' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Bộ Quần Áo Thể Thao Nam Chất Nỉ CottonCao',
            'image' => 'vn-11134207-7r98o-lkuihpjidmpn2a.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 27.000,
            'manufacturer_id' => 2,
            'categories_id' => 2,
            'sex' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'BỘ QUẦN ÁO THỂ THAO NỮ',
            'image' => '436845a322df0db209f11dceb550018a_tn.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 27.000,
            'manufacturer_id' => 3,
            'categories_id' => 5,
            'sex' => 2,
        ]);

        DB::table('products')->insert([
            'name' => 'CHÂN VÁY TENNIS 2 LỚP CAO CẤP',
            'image' => 'vn-11134201-23030-skss6gebomovff.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 27.000,
            'manufacturer_id' => 3,
            'categories_id' => 6,
            'sex' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'BỘ QUẦN ÁO THỂ THAO - CLB PSG',
            'image' => 'vn-11134207-7qukw-lhvg35yxvh6p7a.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 27.000,
            'manufacturer_id' => 1,
            'categories_id' => 5,
            'sex' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Bộ phụ kiện dung cụ xoay balisong',
            'image' => 'vn-11134207-7r98o-llvvqgewbtgfa0.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 27.000,
            'manufacturer_id' => 4,
            'categories_id' => 6,
            'sex' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Dây Nhảy Thể Dục Và Đai Bảo Vệ Hỗ Trợ Khắc Phục Gù Lưng Cao Cấp',
            'image' => 'vn-11134207-7r98o-lmygi7di90wvec_tn.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 27.000,
            'manufacturer_id' => 3,
            'categories_id' => 6,
            'sex' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Băng Bảo Vệ Đầu Gối LI-NING Chính Hãng Đệm Đầu Gối',
            'image' => 'vn-11134207-7r98o-llnl6mh9q3in2b.jpg',
            'description' => 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất',
            'price' => 27.000,
            'manufacturer_id' => 5,
            'categories_id' => 6,
            'sex' => 3,
        ]);
    }
}
