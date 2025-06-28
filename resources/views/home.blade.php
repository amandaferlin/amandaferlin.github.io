@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4 fw-bold">Furniture Modern untuk Rumah Anda</h1>
                <p class="lead">Temukan koleksi furniture berkualitas dengan desain minimalis dan modern.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Lihat Produk</a>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="container py-5">
    <h2 class="text-center mb-5">Kategori Produk</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1540574163026-643ea20ade25" class="card-img-top" alt="Living Room">
                <div class="card-body">
                    <h5 class="card-title">Ruang Tamu</h5>
                    <p class="card-text">Sofa, meja, dan dekorasi untuk ruang tamu yang nyaman.</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Produk</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1505693314120-0d443867891c" class="card-img-top" alt="Bedroom">
                <div class="card-body">
                    <h5 class="card-title">Kamar Tidur</h5>
                    <p class="card-text">Tempat tidur dan lemari untuk kamar tidur yang nyaman.</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Produk</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1556912172-45b7abe8b7e1" class="card-img-top" alt="Dining Room">
                <div class="card-body">
                    <h5 class="card-title">Ruang Makan</h5>
                    <p class="card-text">Meja dan kursi makan untuk ruang makan yang elegan.</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Produk</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Products -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Produk Unggulan</h2>
        <div class="row g-4">
            @foreach($products ?? [] as $product)
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                        <p class="card-text"><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- About Section -->
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2>Tentang AtigaMebel</h2>
            <p class="lead">Kami menghadirkan furniture berkualitas tinggi dengan desain modern dan minimalis.</p>
            <p>Setiap produk kami dibuat dengan bahan terbaik dan perhatian terhadap detail. Kami berkomitmen untuk memberikan kenyamanan dan keindahan untuk rumah Anda.</p>
            <div class="row mt-4">
                <div class="col-6">
                    <h3 class="text-primary">100%</h3>
                    <p>Kepuasan Pelanggan</p>
                </div>
                <div class="col-6">
                    <h3 class="text-primary">10+</h3>
                    <p>Tahun Pengalaman</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="https://images.unsplash.com/photo-1555041469-586c1fa20e5d" class="img-fluid rounded" alt="Showroom">
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-dark text-white py-5">
    <div class="container text-center">
        <h2 class="mb-4">Siap Mewujudkan Rumah Impian Anda?</h2>
        <p class="lead mb-4">Hubungi kami untuk konsultasi gratis dan temukan furniture yang tepat untuk rumah Anda</p>
        <a href="#" class="btn btn-primary btn-lg me-3">Hubungi Kami</a>
        <a href="{{ route('products.index') }}" class="btn btn-outline-light btn-lg">Lihat Katalog</a>
    </div>
</div>
@endsection