@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Detail Pesanan #{{ $order->id }}</h1>
                        <p class="text-gray-600">Tanggal: {{ $order->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <span class="px-3 py-1 text-sm font-semibold rounded-full 
                        {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                        ($order->status === 'processing' ? 'bg-blue-100 text-blue-800' : 
                        ($order->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800')) }}">
                        {{ $order->status }}
                    </span>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Produk</h2>
                    <div class="bg-gray-50 rounded-lg p-4">
                        @foreach($order->items as $item)
                            <div class="flex justify-between items-center mb-2">
                                <div>
                                    <p class="font-medium">{{ $item->product->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                </div>
                                <p class="font-medium">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</p>
                            </div>
                        @endforeach
                        <div class="border-t border-gray-200 mt-4 pt-4">
                            <div class="flex justify-between items-center">
                                <p class="font-bold">Total</p>
                                <p class="font-bold text-lg">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if($order->payment)
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">Informasi Pembayaran</h2>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Metode Pembayaran</p>
                                    <p class="font-medium">{{ $order->payment->payment_method }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Status Pembayaran</p>
                                    <p class="font-medium">{{ $order->payment->status }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Jumlah Dibayar</p>
                                    <p class="font-medium">Rp {{ number_format($order->payment->amount, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Tanggal Pembayaran</p>
                                    <p class="font-medium">{{ $order->payment->created_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                            @if($order->payment->payment_proof)
                                <div class="mt-4">
                                    <p class="text-sm text-gray-600 mb-2">Bukti Pembayaran</p>
                                    <img src="{{ Storage::url($order->payment->payment_proof) }}" alt="Bukti Pembayaran" class="max-w-xs rounded-lg">
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="flex justify-end">
                    <a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                        Kembali ke Daftar Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 