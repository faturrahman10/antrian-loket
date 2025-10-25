<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Antrian</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gradient-to-b from-purple-900 via-purple-800 to-purple-900 text-white flex flex-col justify-center items-center h-screen overflow-hidden md:overflow-hidden">

    <main class="w-full h-full flex flex-col justify-center items-center px-4 md:px-10">

        <!-- Card Utama -->
        <div
            class="w-full max-w-3xl bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl text-center py-10 md:py-8 mb-10 md:mb-6 flex flex-col justify-center items-center">
            <h1 class="text-2xl md:text-3xl font-semibold mb-6">Nomor Antrian Saat Ini</h1>
            <div id="current-number"
                class="text-7xl md:text-8xl font-bold text-yellow-400 transition-transform duration-300 scale-100">-
            </div>
            <p id="current-loket" class="mt-6 text-lg md:text-xl text-gray-200">Menunggu...</p>
        </div>

        <!-- Judul Antrian Sebelumnya -->
        <h2 class="text-xl md:text-2xl font-medium mb-4">Antrian Sebelumnya</h2>

        <!-- Card Antrian Sebelumnya -->
        <div id="recent-queues" class="flex flex-wrap justify-center gap-4 md:gap-6 w-full max-w-5xl">
            <div
                class="flex-1 min-w-[170px] max-w-[280px] bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl py-6 text-center">
                <div class="text-3xl font-bold">-</div>
                <p class="text-sm md:text-base text-gray-300 mt-2">Loket -</p>
            </div>
            <div
                class="flex-1 min-w-[170px] max-w-[280px] bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl py-6 text-center">
                <div class="text-3xl font-bold">-</div>
                <p class="text-sm md:text-base text-gray-300 mt-2">Loket -</p>
            </div>
            <div
                class="flex-1 min-w-[170px] max-w-[280px] bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl py-6 text-center">
                <div class="text-3xl font-bold">-</div>
                <p class="text-sm md:text-base text-gray-300 mt-2">Loket -</p>
            </div>
        </div>

    </main>

    <!-- Branding watermark kecil -->
    <div class="absolute bottom-4 right-4 opacity-30 font-semibold text-sm select-none">
        <a href="/dashboard">HospiQu</a>
    </div>

    <!-- Responsif untuk HP -->
    <style>
        @media (max-width: 1000px) {
            body {
                overflow-y: auto !important;
                height: auto !important;
            }
        }
    </style>

</body>

</html>
