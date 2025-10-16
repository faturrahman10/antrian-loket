import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    enabledTransports: ["ws", "wss"],
    disableStats: true,
});

// === Log koneksi ===
console.log("✅ Echo diinisialisasi — menunggu pesan dari server...");
console.log(`🔑 Pusher Key: ${import.meta.env.VITE_PUSHER_APP_KEY}`);
console.log(`📦 Cluster: ${import.meta.env.VITE_PUSHER_APP_CLUSTER}`);

// === Event koneksi ===
window.Echo.connector.pusher.connection.bind("connected", () => {
    console.log("🟢 Terhubung ke Pusher server.");
});

window.Echo.connector.pusher.connection.bind("disconnected", () => {
    console.warn("🔴 Koneksi ke Pusher terputus.");
});

window.Echo.connector.pusher.connection.bind("error", (err) => {
    console.error("⚠️ Koneksi error:", err);
});

// === Mendengarkan event QueueUpdated ===
window.Echo.channel("queues").listen(".QueueUpdated", (e) => {
    console.log("📢 Update diterima:", e.queue);

    const numberEl = document.getElementById("current-number");
    const loketEl = document.getElementById("current-loket");

    if (!numberEl || !loketEl) {
        console.warn("⚠️ Elemen display antrian tidak ditemukan di halaman.");
        return;
    }

    // Ambil data dari event
    const num = e.queue?.nomor ?? "-";
    const loket = e.queue?.loket?.nama ?? "Tidak diketahui";

    // Update tampilan utama
    numberEl.textContent = num;
    loketEl.textContent = `Loket ${loket}`;

    // Animasi lembut saat nomor berubah
    numberEl.classList.add("animate-bounce");
    setTimeout(() => numberEl.classList.remove("animate-bounce"), 1000);

    // Tambahkan ke daftar antrian sebelumnya (jika ada)
    updateRecentQueues(num, loket);

    // 🔊 Suara notifikasi (opsional, bisa diaktifkan)
    playNotificationSound();
});

// === Fungsi tambahan ===

// Tambah ke riwayat antrian sebelumnya
function updateRecentQueues(num, loket) {
    const recentContainer = document.getElementById("recent-queues");
    if (!recentContainer) return;

    // Buat elemen baru
    const newItem = document.createElement("div");
    newItem.className =
        "bg-white/10 p-6 rounded-2xl border border-white/20 transition-all duration-500 hover:bg-white/20";
    newItem.innerHTML = `
        <p class="text-5xl font-bold text-blue-100">${num}</p>
        <span class="block text-lg text-blue-300 mt-2">Loket ${loket}</span>
    `;

    // Masukkan ke depan
    recentContainer.prepend(newItem);

    // Batasi maksimal 3 item
    while (recentContainer.children.length > 3) {
        recentContainer.removeChild(recentContainer.lastChild);
    }
}

// Bunyi notifikasi (bisa diganti dengan suara lain)
function playNotificationSound() {
    const audio = new Audio("/sounds/notification.mp3");
    audio.volume = 0.7;
    audio.play().catch(() => {
        console.warn(
            "🔇 Tidak bisa memutar suara otomatis (butuh interaksi pengguna)"
        );
    });
}
