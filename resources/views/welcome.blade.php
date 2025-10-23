<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'HospiQu') }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-[#F9F8FF] to-white text-gray-800 font-inter antialiased">

    <!-- Navbar -->
    <header class="fixed top-0 left-0 w-full backdrop-blur-md bg-white/60 border-b border-white/20 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <span class="font-bold text-xl text-[#6D28D9] tracking-tight">HospiQu</span>
            </div>
            <nav class="hidden md:flex space-x-11 text-md font-semibold text-gray-700">
                <a href="#features" class="hover:text-[#6D28D9] transition">Fitur</a>
                <a href="#about" class="hover:text-[#6D28D9] transition">Tentang</a>
            </nav>
            <div class="flex items-center space-x-2">
                <a href="{{ route('login') }}"
                    class="bg-[#6D28D9] text-white font-semibold px-4 py-2 rounded-lg hover:bg-[#5B21B6] transition shadow-md">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 rounded-lg font-semibold border border-[#6D28D9] text-[#6D28D9] hover:bg-[#F4EBFF] transition">
                    Daftar
                </a>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="pt-28 pb-14 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-purple-100 via-white to-transparent -z-10"></div>
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight tracking-tight">
                Antrian <span class="text-[#6D28D9]">Modern</span> untuk Era Digital
            </h1>
            <p class="mt-6 text-gray-600 text-lg max-w-2xl mx-auto">
                Solusi pintar untuk mengelola antrian secara real-time. Cepat, efisien, dan bisa diakses dari mana saja.
            </p>
            <div class="mt-10 flex justify-center space-x-4">
                <a href="{{ route('login') }}"
                    class="bg-[#6D28D9] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#5B21B6] transition transform hover:-translate-y-0.5 shadow-lg">
                    Mulai Sekarang
                </a>
                <a href="#features"
                    class="bg-white/70 backdrop-blur-md border border-gray-200 px-6 py-3 rounded-xl font-semibold hover:bg-white transition shadow-sm">
                    Lihat Fitur
                </a>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-14 bg-[#F9F8FF]">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-14">Fitur Unggulan</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div
                    class="p-8 rounded-3xl backdrop-blur-md bg-white/70 shadow-md hover:shadow-lg hover:scale-[1.02] transition">
                    <div
                        class="mx-auto mb-5 h-14 w-14 rounded-2xl bg-[#EDE9FE] flex items-center justify-center text-[#6D28D9]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Manajemen Antrian</h3>
                    <p class="text-gray-600 text-sm">Tambah, atur, dan panggil antrian dari dashboard real-time modern.
                    </p>
                </div>

                <div
                    class="p-8 rounded-3xl backdrop-blur-md bg-white/70 shadow-md hover:shadow-lg hover:scale-[1.02] transition">
                    <div
                        class="mx-auto mb-5 h-14 w-14 rounded-2xl bg-[#EDE9FE] flex items-center justify-center text-[#6D28D9]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M9 16h6" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Real-time Update</h3>
                    <p class="text-gray-600 text-sm">Semua antrian tersinkron otomatis tanpa perlu refresh halaman.</p>
                </div>

                <div
                    class="p-8 rounded-3xl backdrop-blur-md bg-white/70 shadow-md hover:shadow-lg hover:scale-[1.02] transition">
                    <div
                        class="mx-auto mb-5 h-14 w-14 rounded-2xl bg-[#EDE9FE] flex items-center justify-center text-[#6D28D9]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c1.657 0 3 1.343 3 3s-1.343 3-3 3m0-9a9 9 0 100 18 9 9 0 000-18z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Desain Adaptif</h3>
                    <p class="text-gray-600 text-sm">Tampilan elegan di semua perangkat — dari ponsel hingga layar
                        besar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about"
        class="py-28 bg-gradient-to-br from-[#6D28D9] to-[#4C1D95] text-white text-center relative overflow-hidden">
        <div
            class="absolute inset-0 opacity-20 bg-[url('https://www.toptal.com/designers/subtlepatterns/patterns/memphis-mini.png')]">
        </div>
        <div class="max-w-5xl mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Tentang HospiQu</h2>
            <p class="max-w-2xl mx-auto text-white/90 leading-relaxed">
                HospiQu adalah sistem antrian digital yang dirancang untuk mempercepat pelayanan publik dan rumah sakit.
                Dengan tampilan elegan dan teknologi real-time, HospiQu memberikan pengalaman profesional dan efisien
                untuk setiap pengguna.
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t py-6 text-center text-sm text-gray-500">
        <p>© {{ date('Y') }} <strong>HospiQu</strong> — Dibuat dengan 💜 oleh Fatur.</p>
    </footer>

</body>

</html>
