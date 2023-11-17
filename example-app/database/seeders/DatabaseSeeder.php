<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->truncate();
        DB::table('accounts')->truncate();
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::table('sexes')->truncate();
        DB::table('manufacturers')->truncate();
        $this->call([
            UserSeeder::class,
            SexsSeeder::class,
            CategorySeeder::class,
            ManufacturersSeeder::class,
            ProductsSeeder::class,
        ]);
    }
}
