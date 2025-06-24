<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Laptop Gaming',
                'description' => 'Laptop gaming dengan spesifikasi tinggi',
                'price' => 15000000,
                'stock' => 10,
                'status' => 'active'
            ],
            [
                'name' => 'Smartphone',
                'description' => 'Smartphone dengan kamera 48MP',
                'price' => 5000000,
                'stock' => 20,
                'status' => 'active'
            ],
            [
                'name' => 'Headphone Wireless',
                'description' => 'Headphone dengan noise cancellation',
                'price' => 2000000,
                'stock' => 15,
                'status' => 'active'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 