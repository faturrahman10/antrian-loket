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

window.Echo.connector.pusher.connection.bind("connected", () => {
    console.log("🟢 Terhubung ke Pusher server.");
});

window.Echo.connector.pusher.connection.bind("disconnected", () => {
    console.warn("🔴 Koneksi ke Pusher terputus.");
});

window.Echo.connector.pusher.connection.bind("error", (err) => {
    console.error("⚠️ Koneksi error:", err);
});

let currentActiveNumber = null;

window.Echo.channel("queues").listen(".QueueUpdated", (e) => {
    console.log("📢 Update diterima:", e.queue);

    const num = e.queue.nomor ?? "-";
    const loket = e.queue.loket?.nama ?? "Tidak diketahui";

    if (num === currentActiveNumber) return;

    document.getElementById("current-number").textContent = num;
    document.getElementById("current-loket").textContent = "Loket " + loket;

    if (currentActiveNumber !== null) {
        updateRecentQueues(currentActiveNumber, loket);
    }

    currentActiveNumber = num;
});

function updateRecentQueues(num, loket) {
    const recentContainer = document.getElementById("recent-queues");
    if (!recentContainer) return;

    const newItem = document.createElement("div");
    newItem.className =
        "bg-white/10 p-6 rounded-2xl border border-white/20 transition-all duration-500 hover:bg-white/20";
    newItem.innerHTML = `
        <p class="text-5xl font-bold text-center text-blue-100">${num}</p>
        <span class="block text-lg text-center text-blue-300 mt-2">Loket ${loket}</span>
    `;

    recentContainer.prepend(newItem);

    while (recentContainer.children.length > 3) {
        recentContainer.removeChild(recentContainer.lastChild);
    }
}

// function playNotificationSound() {
//     const audio = new Audio("/sounds/notification.mp3");
//     audio.volume = 0.7;
//     audio.play().catch(() => {
//         console.warn(
//             "🔇 Tidak bisa memutar suara otomatis (butuh interaksi pengguna)"
//         );
//     });
// }
