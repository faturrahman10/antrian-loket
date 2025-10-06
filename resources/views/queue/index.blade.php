<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Antrian — {{ $loket->nama }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 text-red-800 p-3 rounded">{{ session('error') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('loket.queue.take', $loket) }}" method="POST">
                    @csrf
                    <x-primary-button type="submit">Ambil Antrian Berikutnya</x-primary-button>
                    <a href="{{ route('loket.dashboard') }}" class="ml-3 px-3 py-1 bg-gray-200 rounded">Kembali</a>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Daftar Antrian Hari Ini</h3>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left">No</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Dipanggil Pada</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($queues as $queue)
                            <tr class="border-b">
                                <td class="px-4 py-2 font-medium">{{ $queue->nomor }}</td>
                                <td class="px-4 py-2 capitalize">
                                    <span
                                        class="px-2 py-1 rounded text-white
                                        @if ($queue->status === 'menunggu') bg-yellow-500
                                        @elseif($queue->status === 'dipanggil') bg-blue-500
                                        @elseif($queue->status === 'selesai') bg-green-500
                                        @elseif($queue->status === 'dilewati') bg-gray-500 @endif">
                                        {{ $queue->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">
                                    {{ $queue->dipanggil_pada ? $queue->dipanggil_pada->format('H:i:s') : '-' }}
                                </td>
                                <td class="px-4 py-2 space-x-2">
                                    @if ($queue->status === 'dipanggil')
                                        <form action="{{ route('queue.skip', $queue) }}" method="POST" class="inline">
                                            @csrf
                                            <x-danger-button>Lewati</x-danger-button>
                                        </form>
                                        <form action="{{ route('queue.finish', $queue) }}" method="POST" class="inline">
                                            @csrf
                                            <x-primary-button>Selesai</x-primary-button>
                                    @else
                                        <span class="text-sm text-gray-500">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                    Belum ada antrian hari ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
