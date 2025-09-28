<x-app-layout>
    <h2 class="font-semibold text-xl">Edit Loket</h2>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->any() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('loket.update', $loket) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="" class="font-medium block">Nama Loket</label>
                        <input type="text" name="nama" value="{{ old('nama', $loket->nama) }}" required
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label for="" class="font-medium block">Keterangan</label>
                        <input type="text" name="keterangan" value="{{ old('keterangan', $loket->keterangan) }}"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>

                    <div class="flex gap-2 justify-end">
                        <a href="{{ route('loket.dashboard') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
