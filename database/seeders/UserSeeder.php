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
        User::create([
            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'is_admin'=> true,
            'password'=> 'admin123'
        ]);
        User::create([
            'name'=> 'fahri',
            'email'=> 'fahri@gmail.com',
            'is_admin'=> false,
            'password'=> 12345678
        ]);
    }
}
