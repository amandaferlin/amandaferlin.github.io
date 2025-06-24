<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::whereHas('order', function($query) {
                $query->where('user_id', Auth::id());
            })
            ->with('order')
            ->latest()
            ->paginate(10);
            
        return view('payments.index', compact('payments'));
    }

    public function show(Payment $payment)
    {
        if ($payment->order->user_id !== Auth::id()) {
            abort(403);
        }

        $payment->load('order');
        return view('payments.show', compact('payment'));
    }

    public function store(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return back()->with('error', 'Pesanan tidak dapat dibayar');
        }

        $request->validate([
            'amount' => 'required|numeric|min:' . $order->total_amount,
            'payment_method' => 'required|in:transfer,bank,cash',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->amount = $request->amount;
        $payment->payment_method = $request->payment_method;
        $payment->status = 'pending';

        if ($request->hasFile('payment_proof')) {
            $image = $request->file('payment_proof');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/payments', $imageName);
            $payment->payment_proof = 'payments/' . $imageName;
        }

        $payment->save();

        $order->update(['status' => 'processing']);

        return redirect()->route('payments.show', $payment)
            ->with('success', 'Bukti pembayaran berhasil diunggah');
    }
} 