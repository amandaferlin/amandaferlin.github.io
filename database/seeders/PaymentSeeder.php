<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Order;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $order = Order::first();

        Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total_amount,
            'payment_method' => 'bank_transfer',
            'transaction_id' => 'TRX' . time(),
            'status' => 'pending',
            'payment_proof' => null
        ]);
    }
} 