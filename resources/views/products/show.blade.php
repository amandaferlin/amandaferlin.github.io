@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
                <div class="p-8 md:w-1/2">
                    <div class="flex justify-between items-start mb-6">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $product->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->status }}
                        </span>
                    </div>
                    
                    <p class="text-gray-600 mb-6">{{ $product->description }}</p>
                    
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
                        <p class="text-gray-600">Stok: {{ $product->stock }}</p>
                    </div>

                    <div class="flex space-x-4">
                        <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                Hapus
                            </button>
                        </form>
                        <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 