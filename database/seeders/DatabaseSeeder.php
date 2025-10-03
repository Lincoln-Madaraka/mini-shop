<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seeding my application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@demo.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // "password"
                'email_verified_at' => now(),
                'role' => 'admin',
            ]
        );

        // Customer user
        User::updateOrCreate(
            ['email' => 'customer@demo.com'],
            [
                'name' => 'Customer',
                'password' => Hash::make('password'), // "password"
                'email_verified_at' => now(),
                'role' => 'customer',
            ]
        );
    }
}