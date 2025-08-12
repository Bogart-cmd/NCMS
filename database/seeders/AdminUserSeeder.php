<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User_info;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create default admin user if not exists
        $existing = User_info::where('username', 'admin')->first();
        if ($existing) {
            return;
        }

        User_info::create([
            'fname' => 'Admin',
            'lname' => 'User',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'decrypt' => 'admin',
            'usertype' => 'admin',
        ]);
    }
}


