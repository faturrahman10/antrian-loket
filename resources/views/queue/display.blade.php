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

    <script type="module">
        import Echo from "laravel-echo";
        import Pusher from "pusher-js";

        window.Pusher = Pusher;
        window.Echo = new Echo({
            broadcaster: "pusher",
            key: import.meta.env.VITE_PUSHER_APP_KEY,
            cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
            forceTLS: true,
        });

        console.log("📺 Display aktif, menunggu update antrian...");

        window.Echo.channel("queues").listen(".queue.updated", (e) => {
            console.log("📢 Update diterima:", e.queue);

            const num = e.queue.nomor;
            const loket = e.queue.loket?.nama ?? "Tidak diketahui";

            document.getElementById("current-number").textContent = num;
            document.getElementById("current-loket").textContent = "Loket " + loket;

            // Optional: bunyikan suara
            const audio = new Audio("/sounds/notification.mp3");
            audio.play().catch(() => {});
        });
    </script>
</x-app-layout>
