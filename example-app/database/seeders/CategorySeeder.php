<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Giày'
        ]);

        DB::table('categories')->insert([
            'name' => 'Áo'
        ]);

        DB::table('categories')->insert([
            'name' => 'Quần'
        ]);
        DB::table('categories')->insert([
            'name' => 'Áo đấu'
        ]);

        DB::table('categories')->insert([
            'name' => 'Bộ'
        ]);

        DB::table('categories')->insert([
            'name' => 'Phụ kiện'
        ]);
    }
}
