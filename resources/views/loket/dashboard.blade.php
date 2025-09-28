<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading tight">
            {{ __('Daftar Loket') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Daftar Loket</h3>
                <div class="mb-4">
                    <a href="{{ route('loket.create') }}" class="inline-block bg-green-500 text-white px-3 py-1 rounded">
                        + Tambah Loket
                    </a>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Nama Loket</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                            <th class="px-4 py-2 text-left">Aksi Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lokets as $loket)
                            <tr>
                                <td class="px-4 py-2">{{ $loket->id }}</td>
                                <td class="px-4 py-2">{{ $loket->nama }}</td>
                                <td class="px-4 py-2">
                                    <x-primary-button>Panggil Berikutnya</x-primary-button>
                                    <x-secondary-button>Panggil Ulang</x-secondary-button>
                                    <x-danger-button>Lewati</x-danger-button>
                                </td>
                                <td class="px-4 py-2">
                                    <button class="bg-yellow-500 px-2 py-1 rounded text-white">
                                        <a href="{{ route('loket.edit', $loket) }}">Edit</a>
                                    </button>
                                    <button class="bg-blue-500 px-2 py-1 rounded text-white">
                                        <a href="{{ route('loket.show', $loket) }}">Show</a>
                                    </button>
                                    <form action="{{ route('loket.destroy', $loket) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 px-2 py-1 rounded text-white"
                                            onclick="return confirm('Yakin ingin menghapus loket ini?')">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
