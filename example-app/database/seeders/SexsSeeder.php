<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sexes')->insert([
            'text' => 'Nam',
        ]);

        DB::table('sexes')->insert([
            'text' => 'Nữ',
        ]);

        DB::table('sexes')->insert([
            'text' => 'Tất cả',
        ]);
    }
}