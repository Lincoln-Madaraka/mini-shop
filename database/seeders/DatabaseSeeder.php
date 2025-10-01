<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed demo users and products
        $this->call([
            UsersSeeder::class,
            ProductsSeeder::class,
        ]);
    }
}
