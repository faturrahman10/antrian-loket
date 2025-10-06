<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Antrian') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" onclick="this.parentElement.parentElement.style.display='none';" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>    
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action={{ route('queue.store') }} method="POST">
                    @csrf
                    <x-primary-button type="submit">+ Tambah Antrian Baru</x-primary-button>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Antrian Hari ini</h3>
                <table class="min-w-full font-medium mb-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Nomor</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Loket</th>
                            <th class="px-4 py-2 text-left">Waktu Panggil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $queues as $queue )
                            <tr class="border-b">
                                <td class="px-4 py-2 font-medium">{{ $queue->nomor }}</td>
                                <td class="px-4 py-2 capitalize">{{ $queue->status }}</td>
                                <td class="px-4 py-2">{{ $queue->loket->nama ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $queue->dipanggil_pada ? $queue->dipanggil_pada->format('H:i:s') : '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
