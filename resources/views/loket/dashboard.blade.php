<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading tight">
            {{ __('Daftar Loket')}}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Daftar Loket</h3>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Nama Loket</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $lokets as $loket )
                            tr>
                                <td class="px-4 py-2">{{ $loket->id }}</td>
                                <td class="px-4 py-2">{{ $loket->nama_loket }}</td>
                                <td class="px-4 py-2">
                                    <x-primary-button>Panggil Berikutnya</x-primary-button>
                                    <x-secondary-button>Panggil Ulang</x-secondary-button>
                                    <x-danger-button>Lewati</x-danger-button>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
