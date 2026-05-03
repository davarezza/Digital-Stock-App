<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Digital Stock',
            'email' => 'admin@digitalstock.com',
            'phone_number' => '628123456789',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}
