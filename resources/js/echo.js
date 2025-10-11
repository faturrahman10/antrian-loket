import Echo from "laravel-echo";
import Pusher from "pusher-js";

// 🔧 Set global Pusher agar Laravel Echo bisa menggunakannya
window.Pusher = Pusher;

// 🚀 Inisialisasi Laravel Echo
window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    // reconnect otomatis kalau koneksi terputus
    enabledTransports: ["ws", "wss"], // lebih stabil
    disableStats: true,
});

console.log("✅ Echo diinisialisasi — menunggu pesan dari server...");
console.log(`🔑 Pusher Key: ${import.meta.env.VITE_PUSHER_APP_KEY}`);
console.log(`📦 Cluster: ${import.meta.env.VITE_PUSHER_APP_CLUSTER}`);

// 🧩 Dengarkan channel publik 'queues' dan event '.queue.updated'
window.Echo.channel("queues")
    .listen(".queue.updated", (e) => {
        console.log("📢 Pesan diterima dari server:", e.message);

        // Tampilkan notifikasi sederhana
        alert(`Pesan baru: ${e.message}`);
    })
    .error((err) => {
        console.error("❌ Error pada koneksi channel:", err);
    });

// 🧠 Event listener opsional (debug koneksi)
window.Echo.connector.pusher.connection.bind("connected", () => {
    console.log("🟢 Terhubung ke Pusher server.");
});
window.Echo.connector.pusher.connection.bind("disconnected", () => {
    console.warn("🔴 Koneksi ke Pusher terputus.");
});
window.Echo.connector.pusher.connection.bind("error", (err) => {
    console.error("⚠️ Koneksi error:", err);
});
