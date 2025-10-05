<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'image' => 'products/3jBthEfrusBWTR7JGd3FREZ9f96OfT2FS0p1Z46E.jpg',
                'name' => 'Cadbury',
                'price' => 399.00,
                'stock' => 37,
                'description' => 'Satisfy your cravings.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'products/tt3HQ4oFVZg8uVLG2DI8AeKZ2WsM2XIE2WxA6csf.jpg',
                'name' => 'Coke Soft Drink',
                'price' => 45.00,
                'stock' => 7,
                'description' => 'Taste the feeling',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'products/U0uNWaJit8Mk6UBsM2vjRQHIYyDf8sOuu06GRO6q.jpg',
                'name' => 'Crisps',
                'price' => 455.00,
                'stock' => 33,
                'description' => 'Crunchy, Spicy.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'products/nstSsEFe26n7MPZMFGB8TmzySjd5TncwtHztfQLP.jpg',
                'name' => 'Golden Fry',
                'price' => 599.00,
                'stock' => 0,
                'description' => 'A cooks best friend.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'products/ZdPYLFh9eKbbrDBFrP36Np4lO6QUqO0V1GY0X5Ke.jpg',
                'name' => 'Liquid Detergent',
                'price' => 344.00,
                'stock' => 10,
                'description' => 'Washes your products clean.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'products/aChq7mQ5euytSIaiRhY4yuuEQDtRJ5qIB6MZwAiZ.jpg',
                'name' => 'MacBook Pro',
                'price' => 69000.00,
                'stock' => 5,
                'description' => 'A laptop to suit your needs.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'products/eulfsLs0WPxxHnaMCTBh7BURkqBWGgNSQJQiRCCb.jpg',
                'name' => 'Sweet Yoghurt',
                'price' => 30.00,
                'stock' => 13,
                'description' => 'Creamy, tasty.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'products/MHCfAFeXw7F9eafX1X1ZRdZ0mu9w5obWXU786HPo.jpg',
                'name' => 'Sunlight',
                'price' => 99.00,
                'stock' => 15,
                'description' => 'Get it spic and span.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'products/eHoMdELJwsg0t2VnM8EUWd1i6dSPjSBW1CVjXQzZ.jpg',
                'name' => 'Milo',
                'price' => 399.00,
                'stock' => 23,
                'description' => 'Try this, you will love it.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'products/OwBlomYxdoNqQmbZ2VaH9DnU3AvEIjls9obuSL2l.jpg',
                'name' => 'Golden Fry',
                'price' => 499.00,
                'stock' => 3,
                'description' => 'The best salad for your needs.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
