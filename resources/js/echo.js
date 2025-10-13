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

console.log("✅ Echo diinisialisasi — menunggu pesan dari server...");
console.log(`🔑 Pusher Key: ${import.meta.env.VITE_PUSHER_APP_KEY}`);
console.log(`📦 Cluster: ${import.meta.env.VITE_PUSHER_APP_CLUSTER}`);

window.Echo.channel("queues").listen(".QueueUpdated", (e) => {
    console.log("📢 Update diterima:", e.queue);

    const num = e.queue.nomor ?? "-";
    const loket = e.queue.loket?.nama ?? "Tidak diketahui";

    document.getElementById("current-number").textContent = num;
    document.getElementById("current-loket").textContent = "Loket " + loket;

    alert(`Antrian #${num} sedang dipanggil di ${loket}`);
});

window.Echo.connector.pusher.connection.bind("connected", () => {
    console.log("🟢 Terhubung ke Pusher server.");
});
window.Echo.connector.pusher.connection.bind("disconnected", () => {
    console.warn("🔴 Koneksi ke Pusher terputus.");
});
window.Echo.connector.pusher.connection.bind("error", (err) => {
    console.error("⚠️ Koneksi error:", err);
});
