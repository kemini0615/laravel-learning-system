<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // insert() 메소드는 Query Builder, 기능이 부족하지만, 빠르고 대량의 데이터 투입에 적합하다.
        User::insert([
            [
                'name' => 'Kemini',
                'email' => 'kemini@test.com',
                'password' => bcrypt('password'),
                'role' => 'instructor'
            ],
            [
                'name' => 'Jieun',
                'email' => 'jieun@test.com',
                'password' => bcrypt('password'),
                'role' => 'instructor'
            ]
        ]);
    }
}
