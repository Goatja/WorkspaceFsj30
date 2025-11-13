<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop',
            'description' => 'A powerful laptop for all your needs.',
            'price' => 1200.50,
            'stock' => 15,
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Laravel Book',
            'description' => 'Learn Laravel from scratch.',
            'price' => 45.99,
            'stock' => 50,
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'Garden Shovel',
            'description' => 'A sturdy shovel for your garden.',
            'price' => 25.00,
            'stock' => 30,
            'category_id' => 3
        ]);
    }
}
