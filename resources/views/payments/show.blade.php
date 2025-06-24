@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Detail Pembayaran #{{ $payment->id }}</h1>
                        <p class="text-gray-600">Tanggal: {{ $payment->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <span class="px-3 py-1 text-sm font-semibold rounded-full 
                        {{ $payment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                        ($payment->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                        {{ $payment->status }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pesanan</h2>
                        <div class="space-y-2">
                            <div>
                                <p class="text-sm text-gray-600">ID Pesanan</p>
                                <p class="font-medium">#{{ $payment->order_id }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Total Pesanan</p>
                                <p class="font-medium">Rp {{ number_format($payment->order->total_amount, 0, ',', '.') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Status Pesanan</p>
                                <p class="font-medium">{{ $payment->order->status }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pembayaran</h2>
                        <div class="space-y-2">
                            <div>
                                <p class="text-sm text-gray-600">Metode Pembayaran</p>
                                <p class="font-medium">{{ $payment->payment_method }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Jumlah Dibayar</p>
                                <p class="font-medium">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Status Pembayaran</p>
                                <p class="font-medium">{{ $payment->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if($payment->payment_proof)
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">Bukti Pembayaran</h2>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <img src="{{ Storage::url($payment->payment_proof) }}" alt="Bukti Pembayaran" class="max-w-lg rounded-lg">
                        </div>
                    </div>
                @endif

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('payments.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                        Kembali ke Daftar Pembayaran
                    </a>
                    <a href="{{ route('orders.show', $payment->order) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Lihat Detail Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 