<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['name'=>'Red T-Shirt','price'=>19.99,'stock'=>10,'description'=>'Comfort tee'],
            ['name'=>'Blue Hoodie','price'=>39.99,'stock'=>5,'description'=>'Warm and cozy'],
            ['name'=>'Sneakers','price'=>59.99,'stock'=>8,'description'=>'Everyday sneakers'],
            ['name'=>'Cap','price'=>12.50,'stock'=>20,'description'=>'Sun cap'],
            ['name'=>'Jeans','price'=>49.99,'stock'=>6,'description'=>'Denim jeans'],
            ['name'=>'Socks','price'=>5.00,'stock'=>50,'description'=>'Pair of socks'],
            ['name'=>'Backpack','price'=>45.00,'stock'=>3,'description'=>'Travel backpack'],
            ['name'=>'Watch','price'=>80.00,'stock'=>2,'description'=>'Analog watch'],
        ];

        foreach ($items as $i) {
            Product::updateOrCreate(['name'=>$i['name']], $i);
        }
    }
}
