<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Antrian') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-medium mb-4">Pilih Loket untuk Kelola Antrian</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($lokets as $loket)
                        <div class="border rounded-lg p-4 shadow-sm flex justify-between items-center">
                            <span class="font-semibold text-gray-700">{{ $loket->nama }}</span>
                            <a href="{{ route('loket.queue.show', $loket) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                Kelola Antrian
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada loket tersedia.</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
