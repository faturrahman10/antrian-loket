<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">
                Dashboard Antrian
            </h2>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Alert Sukses --}}
            @if (session('success'))
                <div
                    class="flex items-center justify-between bg-green-50 border border-green-300 text-green-700 px-5 py-3 rounded-xl shadow-sm transition-all">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span><strong>Sukses:</strong> {{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()"
                        class="text-green-700 hover:text-green-900 transition">
                        ✖
                    </button>
                </div>
            @endif

            {{-- Tombol Tambah Antrian --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Tambah Antrian Baru</h3>
                    <p class="text-sm text-gray-500">Klik tombol di bawah untuk menambah antrian berikutnya.</p>
                </div>
                <form action="{{ route('queue.store') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg shadow-md transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Antrian
                    </button>
                </form>
            </div>

            {{-- Daftar Antrian Hari Ini --}}
            <div
                class="bg-white overflow-hidden shadow-sm sm:rounded-2xl p-6 transition-all hover:shadow-lg border border-gray-100">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900">📅 Antrian Hari Ini</h3>
                        <p class="text-sm text-gray-500">Pantau status antrian yang sedang berjalan hari ini.</p>
                    </div>
                    <span class="text-sm px-3 py-1 bg-purple-100 text-purple-700 rounded-full">
                        Total: {{ count($queues) }}
                    </span>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full text-sm text-left text-gray-700">
                        <thead class="bg-purple-600 text-white uppercase text-xs tracking-wider">
                            <tr>
                                <th class="px-6 py-3">Nomor</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3">Loket</th>
                                <th class="px-6 py-3">Waktu Panggil</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($queues as $queue)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-3 font-semibold text-gray-800">
                                        {{ $queue->nomor }}
                                    </td>
                                    <td class="px-6 py-3">
                                        @php
                                            $statusColor =
                                                [
                                                    'menunggu' => 'bg-yellow-100 text-yellow-700',
                                                    'dipanggil' => 'bg-blue-100 text-blue-700',
                                                    'selesai' => 'bg-green-100 text-green-700',
                                                    'batal' => 'bg-red-100 text-red-700',
                                                ][$queue->status] ?? 'bg-gray-100 text-gray-700';
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusColor }}">
                                            {{ ucfirst($queue->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $queue->loket->nama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-3 text-gray-500">
                                        {{ $queue->dipanggil_pada ? $queue->dipanggil_pada->format('H:i:s') : '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-6 text-gray-500">
                                        Belum ada antrian hari ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 text-sm text-gray-400 text-center">
                    © {{ date('Y') }} Sistem Antrian — Dibuat dengan ❤️ oleh fatur.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
