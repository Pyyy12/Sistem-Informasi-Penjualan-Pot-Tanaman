@extends('layouts.app')

@section('title', 'Katalog Pot & Media Tanah Tanaman Khusus - TerraFlora')

@section('content')
<!-- Hero Section -->
<div class="relative bg-emerald-900 text-white py-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="max-w-7xl mx-auto relative z-10">
        <span class="bg-emerald-800/80 text-emerald-200 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">Spesialis Tanaman Hias</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-4 max-w-2xl leading-tight">
            Pot Estetik Berpori & Racikan Tanah Tepat untuk Tanaman Spesialmu.
        </h1>
        <p class="mt-4 text-emerald-100 max-w-xl text-base leading-relaxed">
            Pilih pot berdasarkan ukuran lingkar akar serta jenis media tanam yang dirancang khusus untuk mencegah busuk akar pada Aroid, Sukulen, hingga Bonsai.
        </p>
    </div>
    <div class="absolute -right-10 -bottom-20 opacity-10 text-[260px] select-none pointer-events-none">🌿</div>
</div>

<!-- Main Catalog Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        
        <!-- Sidebar Filter -->
        <aside class="lg:col-span-1 space-y-6">
            <form action="{{ route('catalog.index') }}" method="GET" class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm space-y-6">
                <!-- Search Input -->
                <div>
                    <label class="block text-xs font-bold uppercase text-stone-500 mb-2">Cari Tanaman / Pot</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Contoh: Monstera, Terracotta..." 
                           class="w-full text-sm px-3 py-2 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-600">
                </div>

                <!-- Filter Ukuran Pot -->
                <div>
                    <label class="block text-xs font-bold uppercase text-stone-500 mb-2">Ukuran Pot</label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm text-stone-700 cursor-pointer">
                            <input type="radio" name="size" value="" {{ request('size') == '' ? 'checked' : '' }} onchange="this.form.submit()" class="text-emerald-700 focus:ring-emerald-600">
                            Semua Ukuran
                        </label>
                        @foreach($potSizes as $size)
                        <label class="flex items-center justify-between text-sm text-stone-700 cursor-pointer">
                            <span class="flex items-center gap-2">
                                <input type="radio" name="size" value="{{ $size->slug }}" {{ request('size') == $size->slug ? 'checked' : '' }} onchange="this.form.submit()" class="text-emerald-700 focus:ring-emerald-600">
                                {{ $size->name }}
                            </span>
                            <span class="text-xs bg-stone-100 text-stone-500 px-2 py-0.5 rounded-full font-semibold">{{ $size->products_count }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <!-- Filter Jenis Tanah -->
                <div>
                    <label class="block text-xs font-bold uppercase text-stone-500 mb-2">Formula Jenis Media/Tanah</label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm text-stone-700 cursor-pointer">
                            <input type="radio" name="soil" value="" {{ request('soil') == '' ? 'checked' : '' }} onchange="this.form.submit()" class="text-emerald-700 focus:ring-emerald-600">
                            Semua Formula
                        </label>
                        @foreach($soilTypes as $soil)
                        <label class="flex items-center justify-between text-sm text-stone-700 cursor-pointer">
                            <span class="flex items-center gap-2">
                                <input type="radio" name="soil" value="{{ $soil->slug }}" {{ request('soil') == $soil->slug ? 'checked' : '' }} onchange="this.form.submit()" class="text-emerald-700 focus:ring-emerald-600">
                                {{ $soil->name }}
                            </span>
                            <span class="text-xs bg-stone-100 text-stone-500 px-2 py-0.5 rounded-full font-semibold">{{ $soil->products_count }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="pt-2 flex gap-2">
                    <button type="submit" class="w-full py-2 bg-emerald-700 hover:bg-emerald-800 text-white rounded-lg text-sm font-semibold transition">
                        Terapkan Filter
                    </button>
                    @if(request()->hasAny(['size', 'soil', 'search']))
                        <a href="{{ route('catalog.index') }}" class="py-2 px-3 bg-stone-100 hover:bg-stone-200 text-stone-700 rounded-lg text-sm font-medium transition text-center">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </aside>

        <!-- Product Grid -->
        <div class="lg:col-span-3">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-bold text-stone-900">Koleksi Pot & Formula Tanah</h2>
                    <p class="text-xs text-stone-500 mt-1">Ditemukan {{ $products->total() }} produk rekomendasi</p>
                </div>
            </div>

            @if($products->isEmpty())
                <div class="bg-white rounded-2xl border border-dashed border-stone-300 p-12 text-center">
                    <span class="text-4xl">🪴</span>
                    <h3 class="text-base font-semibold text-stone-800 mt-3">Tidak ada produk yang cocok</h3>
                    <p class="text-sm text-stone-500 mt-1">Coba sesuaikan kombinasi filter ukuran pot atau jenis tanah Anda.</p>
                    <a href="{{ route('catalog.index') }}" class="inline-block mt-4 px-4 py-2 bg-emerald-700 text-white text-xs font-semibold rounded-lg">Reset Semua Filter</a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden hover:shadow-lg transition-all flex flex-col group">
                            <!-- Image Container -->
                            <div class="relative h-56 bg-stone-100 overflow-hidden">
                                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/600x400' }}" alt="{{ $product->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                <div class="absolute top-3 left-3 flex flex-col gap-1">
                                    <span class="bg-emerald-900/80 backdrop-blur-sm text-white text-[11px] font-medium px-2.5 py-1 rounded-md">
                                        {{ $product->potSize->diameter_range }}
                                    </span>
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <!-- Soil Indicator Badge -->
                                    <div class="mb-2">
                                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-800 bg-amber-50 border border-amber-200/60 px-2.5 py-0.5 rounded-full">
                                            <span>🪨</span> {{ $product->soilType->name }}
                                        </span>
                                    </div>

                                    <h3 class="font-bold text-stone-900 text-lg leading-snug group-hover:text-emerald-700 transition">
                                        <a href="{{ route('catalog.show', $product->slug) }}">{{ $product->title }}</a>
                                    </h3>

                                    <!-- Cocok Untuk Spesifik Tanaman -->
                                    <div class="mt-3 text-xs bg-stone-50 border border-stone-100 rounded-lg p-2.5 text-stone-600">
                                        <span class="font-semibold text-stone-800 block mb-0.5">🌱 Spesialis Tanaman:</span>
                                        {{ $product->target_plant }}
                                    </div>
                                </div>

                                <div class="mt-5 pt-4 border-t border-stone-100 flex items-center justify-between">
                                    <div>
                                        <span class="text-[11px] text-stone-400 block">Harga Bundling</span>
                                        <span class="text-lg font-bold text-emerald-800">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>
                                    <a href="{{ route('catalog.show', $product->slug) }}" class="px-3.5 py-2 bg-stone-900 hover:bg-emerald-700 text-white text-xs font-semibold rounded-lg transition">
                                        Detail & Beli
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection