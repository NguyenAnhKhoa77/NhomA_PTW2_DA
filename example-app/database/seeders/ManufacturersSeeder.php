<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('manufacturers')->insert([
            'name' => 'Adidas',
            'image' => 'adidas.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Hitec',
            'image' => 'hitec.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'NEW BALANCE',
            'image' => 'newbalance.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Reebok',
            'image' => 'reebok.png',
        ]);

        DB::table('manufacturers')->insert([
            'name' => 'Nike',
            'image' => 'nike.png',
        ]);

        DB::table('manufacturers')->insert([
            'name' => 'Puma',
            'image' => 'puma.png',
        ]);
    }
}