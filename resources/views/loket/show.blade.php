<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Detail Loket</h2>
    </x-slot>

    <p class="py-6">
        <div class="mx-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <p><strong>Nama : </strong>{{ $loket->nama }}</p>
                <p><strong>Keterangan : </strong>{{ $loket->keterangan ?? '-' }}</p>
            </div>
        </div>
    </p>
</x-app-layout>