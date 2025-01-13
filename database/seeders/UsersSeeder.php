<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'ادمین',
                'email' => 'Admin@example.com',
                'password' => Hash::make('12345'),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'phone' => "09121234123" ,
            ],
            [
                'name' => 'تامین کننده',
                'email' => 'Supplier@example.com',
                'password' => Hash::make('12345'),
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'phone' => "09191234123" ,
            ],
            [
                'name' => 'کاربر عادی اول',
                'email' => 'user1@example.com',
                'password' => Hash::make('12345'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'phone' => "09381233537" ,
            ],
            [
                'name' => 'کاربر عادی اول',
                'email' => 'user2@example.com',
                'password' => Hash::make('12345'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'phone' => "09366372722" ,

            ],
        ]);

    }
}
