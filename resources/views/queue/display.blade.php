<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-center text-gray-800">
            Layar Antrian
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white shadow-lg rounded-2xl p-10 text-center w-full max-w-3xl">
            <h1 class="text-4xl font-bold mb-4">Nomor Antrian Dipanggil</h1>
            <div id="current-number" class="text-7xl font-extrabold text-blue-600">-</div>
            <div id="current-loket" class="text-3xl mt-4 text-gray-700">Menunggu...</div>
        </div>
    </div>

    {{-- Cukup ini saja --}}
    @vite(['resources/js/app.js'])
</x-app-layout>
