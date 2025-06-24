<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Ambil user dan produk
        $user = User::where('email', 'user@example.com')->first();
        $products = Product::all();

        // Buat order
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => 0, // Akan diupdate setelah order items dibuat
            'status' => 'pending',
            'shipping_address' => $user->address,
            'shipping_phone' => $user->phone,
            'notes' => 'Pesanan pertama'
        ]);

        // Buat order items
        $totalAmount = 0;
        foreach ($products as $product) {
            $quantity = rand(1, 3);
            $subtotal = $product->price * $quantity;
            $totalAmount += $subtotal;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price,
                'subtotal' => $subtotal
            ]);
        }

        // Update total amount order
        $order->update(['total_amount' => $totalAmount]);
    }
} 