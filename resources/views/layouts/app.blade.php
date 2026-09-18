<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TerraFlora - Pot Presisi & Media Tanam Khusus')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-stone-50 text-stone-800 antialiased min-h-screen flex flex-col justify-between">
    
    <!-- Navbar Header -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="{{ route('catalog.index') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-700 text-white flex items-center justify-center font-bold text-xl shadow-md">
                    🪴
                </div>
                <div>
                    <span class="text-xl font-bold tracking-tight text-stone-900">Terra<span class="text-emerald-700">Flora</span></span>
                    <p class="text-xs text-stone-500">Katalog Pot & Media Tanam Spesialis</p>
                </div>
            </a>
            <div class="hidden md:flex items-center gap-6 text-sm font-medium text-stone-600">
                <a href="{{ route('catalog.index') }}" class="hover:text-emerald-700 transition">Katalog Pot</a>
                <a href="#panduan-tanah" class="hover:text-emerald-700 transition">Panduan Media Tanam</a>
                <a href="#tentang-kami" class="hover:text-emerald-700 transition">Tentang Kami</a>
            </div>
            <div>
                <a href="https://wa.me/" target="_blank" class="px-4 py-2 bg-emerald-700 hover:bg-emerald-800 text-white rounded-lg text-sm font-semibold shadow-sm transition">
                    Konsultasi Tanaman
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-300 py-12 mt-20 border-t border-stone-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <span class="text-xl font-bold tracking-tight text-white">Terra<span class="text-emerald-400">Flora</span></span>
                <p class="text-sm mt-3 text-stone-400 leading-relaxed">Menyediakan paket pot premium dan formula racikan tanah porous khusus tanaman hias kolektor agar akar bernapas sehat dan bebas jamur.</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Kategori Tanaman Khusus</h4>
                <ul class="text-sm space-y-2 text-stone-400">
                    <li>Aroid & Philodendron (Porositas Tinggi)</li>
                    <li>Kaktus & Sukulen (Drainase Pasir Ekstra)</li>
                    <li>Bonsai & Tanaman Lembap Terkontrol</li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Hubungi Spesialis Kami</h4>
                <p class="text-sm text-stone-400">Punya tanaman langka yang butuh pot dan racikan tanah khusus? Diskusikan dengan agronomis kami.</p>
                <div class="mt-4 text-emerald-400 font-semibold text-sm">support@terraflora.id</div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pt-6 border-t border-stone-800 text-center text-xs text-stone-500">
            &copy; {{ date('Y') }} TerraFlora Studio. All rights reserved.
        </div>
    </footer>

</body>
</html>