<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('price_ranges')->insert([
            'price_min' => 0,
            'price_max' => 100000,
        ]);

        DB::table('price_ranges')->insert([
            'price_min' => 100001,
            'price_max' => 500000,
        ]);

        DB::table('price_ranges')->insert([
            'price_min' => 500001,
            'price_max' => 1000000,
        ]);

        DB::table('price_ranges')->insert([
            'price_min' => 1000001,
            'price_max' => 4000000,
        ]);
    }
}
