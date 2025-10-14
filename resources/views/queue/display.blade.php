<x-app-layout>
    <x-slot name="header">
        {{-- Kosongkan header agar tampil full screen --}}
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 flex flex-col items-center justify-between text-white font-sans">

        {{-- Header --}}
        <header class="w-full py-6 text-center bg-blue-950 shadow-lg">
            <h1 class="text-4xl font-extrabold tracking-wide uppercase">Sistem Antrian Loket</h1>
            <p class="text-blue-300 text-lg mt-2">Pelayanan Cepat, Tertib, dan Nyaman</p>
        </header>

        {{-- Konten Utama --}}
        <main class="flex-1 flex flex-col items-center justify-center w-full px-6">
            <div class="bg-white/10 backdrop-blur-md shadow-2xl rounded-3xl p-12 text-center w-full max-w-4xl border border-white/20">
                <h2 class="text-3xl font-semibold mb-4 text-blue-200 tracking-wider">Nomor Antrian Saat Ini</h2>

                <div id="current-number" class="text-9xl font-extrabold text-yellow-400 drop-shadow-lg mb-6 animate-pulse">
                    -
                </div>

                <div id="current-loket" class="text-3xl font-semibold text-blue-100">
                    Menunggu...
                </div>
            </div>

            {{-- Info Tambahan / Queue History --}}
            <div class="mt-12 w-full max-w-5xl text-center">
                <h3 class="text-2xl text-blue-200 font-semibold mb-4">Antrian Sebelumnya</h3>
                <div id="recent-queues" class="grid grid-cols-3 gap-6">
                    <div class="bg-white/10 p-6 rounded-2xl border border-white/20">
                        <p class="text-5xl font-bold text-blue-100">-</p>
                        <span class="block text-lg text-blue-300 mt-2">Loket -</span>
                    </div>
                    <div class="bg-white/10 p-6 rounded-2xl border border-white/20">
                        <p class="text-5xl font-bold text-blue-100">-</p>
                        <span class="block text-lg text-blue-300 mt-2">Loket -</span>
                    </div>
                    <div class="bg-white/10 p-6 rounded-2xl border border-white/20">
                        <p class="text-5xl font-bold text-blue-100">-</p>
                        <span class="block text-lg text-blue-300 mt-2">Loket -</span>
                    </div>
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <footer class="w-full py-4 bg-blue-950 text-center text-blue-300 text-sm">
            © {{ date('Y') }} Sistem Antrian — Dibangun dengan Laravel & Tailwind CSS
        </footer>
    </div>

    @vite(['resources/js/app.js'])
</x-app-layout>
