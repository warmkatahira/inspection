<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_id' => 'katahira',
            'last_name' => 'システム管理者',
            'first_name' => '',
            'email' => 't.katahira@warm.co.jp',
            'password' => bcrypt('katahira134'),
            'is_active' => 1,
            'base_id' => 'hiroshima',
        ]);
        User::create([
            'user_id' => 'user1',
            'last_name' => 'ユーザー1',
            'first_name' => '',
            'email' => 'user1@warm.co.jp',
            'password' => bcrypt('user1111'),
            'is_active' => 1,
            'base_id' => 'hiroshima',
        ]);
        User::create([
            'user_id' => 'user2',
            'last_name' => 'ユーザー2',
            'first_name' => '',
            'email' => 'user2@warm.co.jp',
            'password' => bcrypt('user2222'),
            'is_active' => 1,
            'base_id' => '3rd',
        ]);
    }
}