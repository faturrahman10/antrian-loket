<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-purple-800 tracking-tight">
                Antrian — {{ $loket->nama }}
            </h2>
            <span class="text-sm text-gray-500">
                {{ now()->format('l, d F Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-purple-50 via-white to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Alert --}}
            @if (session('success'))
                <div class="flex items-center justify-between bg-green-50 border border-green-300 text-green-700 px-5 py-3 rounded-xl shadow-sm">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span><strong>Sukses:</strong> {{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">✖</button>
                </div>
            @endif

            @if (session('error'))
                <div class="flex items-center justify-between bg-red-50 border border-red-300 text-red-700 px-5 py-3 rounded-xl shadow-sm">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span><strong>Gagal:</strong> {{ session('error') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-red-700 hover:text-red-900">✖</button>
                </div>
            @endif

            {{-- Tombol Aksi --}}
            <div class="bg-white shadow-md sm:rounded-2xl p-6 flex flex-col sm:flex-row items-center justify-between border border-purple-100">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Ambil Antrian Berikutnya</h3>
                    <p class="text-sm text-gray-500">Klik tombol di bawah untuk memanggil antrian selanjutnya di loket ini.</p>
                </div>

                <div class="mt-4 sm:mt-0 flex space-x-3">
                    <form action="{{ route('loket.queue.take', $loket) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg shadow-md transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Ambil Antrian
                        </button>
                    </form>

                    <a href="{{ route('loket.dashboard') }}"
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg shadow-sm transition">
                        ← Kembali
                    </a>
                </div>
            </div>

            {{-- Daftar Antrian Hari Ini --}}
            <div class="bg-white overflow-hidden shadow-md sm:rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900">📋 Daftar Antrian Hari Ini</h3>
                        <p class="text-sm text-gray-500">Status antrian yang aktif di loket ini.</p>
                    </div>
                    <span class="text-sm px-3 py-1 bg-purple-100 text-purple-700 rounded-full">
                        Total: {{ count($queues) }}
                    </span>
                </div>

                <div class="overflow-x-auto border border-gray-200 rounded-lg">
                    <table class="min-w-full text-sm text-gray-700">
                        <thead class="bg-purple-600 text-white uppercase text-xs tracking-wider">
                            <tr>
                                <th class="px-6 py-3 text-left">Nomor</th>
                                <th class="px-6 py-3 text-left">Status</th>
                                <th class="px-6 py-3 text-left">Dipanggil Pada</th>
                                <th class="px-6 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($queues as $queue)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-3 font-semibold text-gray-900">
                                        {{ $queue->nomor }}
                                    </td>
                                    <td class="px-6 py-3">
                                        @php
                                            $statusColor = [
                                                'menunggu' => 'bg-yellow-100 text-yellow-700',
                                                'dipanggil' => 'bg-blue-100 text-blue-700',
                                                'selesai' => 'bg-green-100 text-green-700',
                                                'dilewati' => 'bg-gray-200 text-gray-700',
                                            ][$queue->status] ?? 'bg-gray-100 text-gray-700';
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusColor }}">
                                            {{ ucfirst($queue->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-3 text-gray-500">
                                        {{ $queue->dipanggil_pada ? $queue->dipanggil_pada->format('H:i:s') : '-' }}
                                    </td>
                                    <td class="px-6 py-3 space-x-2">
                                        @if ($queue->status === 'dipanggil')
                                            <form action="{{ route('queue.skip', $queue) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs font-medium transition">
                                                    Lewati
                                                </button>
                                            </form>
                                            <form action="{{ route('queue.finish', $queue) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded-md text-xs font-medium transition">
                                                    Selesai
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-sm text-gray-400">-</span>
                                        @endif
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
                    © {{ date('Y') }} Sistem Antrian — {{ $loket->nama }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
