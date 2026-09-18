@extends('layouts.app')

@section('title', $product->title . ' - TerraFlora')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-4">
        <a href="{{ route('catalog.index') }}" class="text-xs font-semibold text-emerald-700 hover:underline flex items-center gap-1">
            ← Kembali ke Katalog
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-stone-200 shadow-sm overflow-hidden grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 lg:p-10">
        <!-- Media / Gambar Pot -->
        <div class="space-y-4">
            <div class="rounded-2xl overflow-hidden bg-stone-100 aspect-square shadow-inner border border-stone-100">
                <img src="{{ $product->image_url }}" alt="{{ $product->title }}" class="w-full h-full object-cover">
            </div>
            <div class="grid grid-cols-2 gap-3 text-center">
                <div class="p-3 bg-stone-50 rounded-xl border border-stone-100">
                    <span class="text-xs text-stone-500 block">Bahan Pot</span>
                    <span class="font-semibold text-stone-800 text-sm">{{ $product->material }}</span>
                </div>
                <div class="p-3 bg-stone-50 rounded-xl border border-stone-100">
                    <span class="text-xs text-stone-500 block">Kapasitas Stok</span>
                    <span class="font-semibold text-emerald-700 text-sm">{{ $product->stock }} Paket Siap Kirim</span>
                </div>
            </div>
        </div>

        <!-- Detail Spesifikasi -->
        <div class="flex flex-col justify-between space-y-6">
            <div>
                <span class="text-xs uppercase font-bold tracking-wider text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full">
                    Kombinasi Pot & Formula Tanam
                </span>
                <h1 class="text-3xl font-extrabold text-stone-900 mt-3">{{ $product->title }}</h1>
                <p class="text-2xl font-black text-emerald-800 mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                <!-- Box Rekomendasi Tanaman -->
                <div class="mt-6 p-4 rounded-2xl bg-amber-50/60 border border-amber-200/70">
                    <div class="flex items-center gap-2 text-amber-900 font-bold text-sm">
                        <span>🌿</span> Direkomendasikan untuk Tanaman:
                    </div>
                    <p class="text-sm text-stone-700 mt-1 font-medium">{{ $product->target_plant }}</p>
                </div>

                <!-- Spesifikasi Pot dan Tanah -->
                <div class="mt-6 space-y-4">
                    <div class="p-4 rounded-xl border border-stone-200">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-stone-500">Karakteristik Ukuran Pot:</h4>
                        <div class="text-stone-900 font-semibold mt-1">{{ $product->potSize->name }} ({{ $product->potSize->diameter_range }})</div>
                        <p class="text-xs text-stone-600 mt-1">{{ $product->potSize->description }}</p>
                    </div>

                    <div class="p-4 rounded-xl border border-stone-200">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-stone-500">Komposisi Media Tanah Khusus:</h4>
                        <div class="text-stone-900 font-semibold mt-1">{{ $product->soilType->name }}</div>
                        <p class="text-xs text-stone-600 mt-1"><span class="font-medium text-stone-800">Tekstur & Drainase:</span> {{ $product->soilType->texture_drainage }}</p>
                    </div>
                </div>

                <!-- Deskripsi Produk -->
                <div class="mt-6">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-stone-500 mb-1">Deskripsi Paket</h4>
                    <p class="text-sm text-stone-600 leading-relaxed">{{ $product->description }}</p>
                </div>
            </div>

            <!-- Action Button WhatsApp Checkout -->
            <div class="pt-4 border-t border-stone-100 flex gap-4">
                <a href="https://wa.me/?text={{ urlencode('Halo TerraFlora, saya ingin memesan paket pot: ' . $product->title . ' (Rp ' . number_format($product->price, 0, ',', '.') . ')') }}" 
                   target="_blank" 
                   class="w-full text-center py-3.5 bg-emerald-700 hover:bg-emerald-800 text-white font-bold rounded-xl shadow-md transition">
                    Pesan via WhatsApp Sekarang
                </a>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->isNotEmpty())
        <div class="mt-16">
            <h3 class="text-xl font-bold text-stone-900 mb-6">Pilihan Alternatif yang Sesuai</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedProducts as $rel)
                    <div class="bg-white rounded-2xl border border-stone-200 p-4 shadow-sm hover:shadow-md transition">
                        <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}" class="w-full h-40 object-cover rounded-xl mb-3">
                        <h4 class="font-bold text-stone-900 text-sm truncate">{{ $rel->title }}</h4>
                        <p class="text-xs text-stone-500 mt-0.5">{{ $rel->potSize->name }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="font-bold text-emerald-800 text-sm">Rp {{ number_format($rel->price, 0, ',', '.') }}</span>
                            <a href="{{ route('catalog.show', $rel->slug) }}" class="text-xs font-semibold text-emerald-700 hover:underline">Lihat Detail →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection