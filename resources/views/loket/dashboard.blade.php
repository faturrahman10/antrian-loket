<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">
                Dashboard Loket
            </h2>
            <a href="{{ route('loket.create') }}"
                class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg shadow transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Loket
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 hover:shadow-2xl transition-all duration-300">
                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">📅 Daftar Loket</h3>
                            <p class="text-sm text-gray-500 mt-1">Kelola data loket dan akses manajemen antrian di sini.
                            </p>
                        </div>
                        <div>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 text-sm rounded-full font-medium">
                                Total: {{ count($lokets) }}
                            </span>
                        </div>
                    </div>

                    <div class="overflow-x-auto rounded-lg">
                        <table class="min-w-full border-collapse">
                            <thead class="bg-purple-600 text-white uppercase text-xs tracking-wider">
                                <tr>
                                    <th class="px-6 py-3 text-left">#</th>
                                    <th class="px-6 py-3 text-left">NAMA LOKET</th>
                                    <th class="px-6 py-3 text-left">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse ($lokets as $loket)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-3 text-gray-700 font-medium">{{ $loket->id }}</td>
                                        <td class="px-6 py-3 text-gray-700">{{ $loket->nama }}</td>
                                        <td class="px-6 py-3 flex flex-wrap gap-2">
                                            <a href="{{ route('loket.edit', $loket) }}"
                                                class="inline-flex items-center px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-sm font-medium rounded-md shadow-sm transition">
                                                ✏️ Edit
                                            </a>

                                            <a href="{{ route('loket.show', $loket) }}"
                                                class="inline-flex items-center px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-md shadow-sm transition">
                                                👁️ Show
                                            </a>

                                            <form action="{{ route('loket.destroy', $loket) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus loket ini?')"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md shadow-sm transition">
                                                    🗑️ Hapus
                                                </button>
                                            </form>

                                            <a href="{{ route('loket.queue.show', $loket) }}"
                                                class="inline-flex items-center px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md shadow-sm transition">
                                                📋 Kelola Antrian
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-6 text-center text-gray-500">
                                            Belum ada data loket.
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
    </div>
</x-app-layout>
