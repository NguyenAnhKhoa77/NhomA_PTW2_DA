<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([
            'name' => 'user1',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',
        ]);
        DB::table('accounts')->insert([
            'name' => 'user2',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user3',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user4',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user5',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user6',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user7',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user8',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user9',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user10',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user11',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user12',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user13',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user14',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user15',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        DB::table('accounts')->insert([
            'name' => 'user16',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);

        DB::table('accounts')->insert([
            'name' => 'user17',
            'phone' => '1234567890',
            'address' => 'abc',
            'avatar' => 'user.png',

        ]);
        //
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$ezynSqiX.PNvGiiXRTXHC.VfcAb/wvzPw6tS3MlE6GChIKAsWP3tG',
            'is_admin' => 2,
            'id_account' => 1,
        ]);
        DB::table('users')->insert([
            'email' => 'user1@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 2,
        ]);
        DB::table('users')->insert([
            'email' => 'user2@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 3,
        ]);
        DB::table('users')->insert([
            'email' => 'user3@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 4,
        ]);
        DB::table('users')->insert([
            'email' => 'user4@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 5,
        ]);
        DB::table('users')->insert([
            'email' => 'user5@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 6,
        ]);
        DB::table('users')->insert([
            'email' => 'user6@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 7,
        ]);
        DB::table('users')->insert([
            'email' => 'user7@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 8,
        ]);
        DB::table('users')->insert([
            'email' => 'user8@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 9,
        ]);
        DB::table('users')->insert([
            'email' => 'user9@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 10,
        ]);
        DB::table('users')->insert([
            'email' => 'user10@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 11,
        ]);
        DB::table('users')->insert([
            'email' => 'user11@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 12,
        ]);
        DB::table('users')->insert([
            'email' => 'user12@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 13,
        ]);

        DB::table('users')->insert([
            'email' => 'user13@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 14,
        ]);
        DB::table('users')->insert([
            'email' => 'user14@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 15,
        ]);
        DB::table('users')->insert([
            'email' => 'user15@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 16,
        ]);
        DB::table('users')->insert([
            'email' => 'user16@gmail.com',
            'password' => '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS',
            'is_admin' => 0,
            'id_account' => 17,
        ]);
    }
}
