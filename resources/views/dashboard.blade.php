<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-purple-900 tracking-tight">
                Dashboard
            </h2>
            <span class="text-sm text-gray-500">
                {{ now()->format('l, d F Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-purple-50 via-white to-purple-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Welcome Card --}}
            <div
                class="bg-white shadow-lg rounded-2xl p-8 flex flex-col sm:flex-row items-center justify-between border border-purple-100 transition hover:shadow-2xl hover:-translate-y-1 duration-300">
                <div>
                    <h3 class="text-3xl font-extrabold text-purple-800 mb-2">
                        Selamat Datang, <span class="text-gray-800">{{ Auth::user()->name }}!</span>
                    </h3>
                    <p class="text-gray-600 text-lg">
                        Anda berhasil login ke <span class="font-semibold text-purple-600">Sistem Antrian</span>.
                    </p>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/906/906175.png" alt="Dashboard Icon"
                    class="w-32 sm:w-40 mt-6 sm:mt-0 animate-bounce">
            </div>

            {{-- Statistik / Quick Info --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-gradient-to-br from-purple-600 to-purple-800 text-white p-6 rounded-2xl shadow-md hover:shadow-xl transition">
                    <p class="text-sm uppercase tracking-wide text-purple-200">Total Antrian Hari Ini</p>
                    <h4 class="text-3xl font-bold mt-2">-</h4>
                </div>

                <div
                    class="bg-gradient-to-br from-pink-500 to-pink-700 text-white p-6 rounded-2xl shadow-md hover:shadow-xl transition">
                    <p class="text-sm uppercase tracking-wide text-pink-200">Selesai Dilayani</p>
                    <h4 class="text-3xl font-bold mt-2">-</h4>
                </div>

                <div
                    class="bg-gradient-to-br from-indigo-400 to-indigo-600 text-white p-6 rounded-2xl shadow-md hover:shadow-xl transition">
                    <p class="text-sm uppercase tracking-wide text-indigo-100">Menunggu Dipanggil</p>
                    <h4 class="text-3xl font-bold mt-2">-</h4>
                </div>

                <div
                    class="bg-gradient-to-br from-violet-500 to-violet-700 text-white p-6 rounded-2xl shadow-md hover:shadow-xl transition">
                    <p class="text-sm uppercase tracking-wide text-violet-100">Loket Aktif</p>
                    <h4 class="text-3xl font-bold mt-2">-</h4>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-purple-100">
                <h3 class="text-xl font-bold text-purple-900 mb-4">Aksi Cepat</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('queue.display') }}"
                        class="px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-xl shadow-md transition transform hover:-translate-y-1 hover:shadow-lg">
                        🖥️ Lihat Display Publik
                    </a>
                    <a href="#"
                        class="px-6 py-3 bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white rounded-xl shadow-md transition transform hover:-translate-y-1 hover:shadow-lg">
                        📊 Statistik
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
