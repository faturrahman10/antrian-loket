<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tambah Loket</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('succes') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                        <ul class="li-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <form action="{{ route('loket.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="" class="block font-medium">Nama Loket</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required
                        class="mt-1 block w-full border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="" class="block font-medium">Keterangan</label>
                    <input type="text" name="keterangan" value="{{ old('keterangan') }}"
                        class="mt-1 block w-full border-gray-300 shadow-sm">
                </div>

                <div class="flex gap-2 justify-end">
                    <a href="{{ route('loket.dashboard') }}" class="px-4 py-2 bg-gray-200 rouded">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
