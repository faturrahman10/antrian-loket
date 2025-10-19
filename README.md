# 🏢 Sistem Antrian Real-Time Berbasis Laravel

Proyek ini adalah **aplikasi antrian digital real-time** yang dikembangkan menggunakan **Laravel**, **Pusher**, dan **Laravel Echo**.  
Aplikasi ini memungkinkan pemanggilan nomor antrian secara langsung dan menampilkan update **tanpa reload halaman** di layar display publik — cocok untuk digunakan di **loket pelayanan, rumah sakit, bank, dan instansi pemerintahan**.

---

## ✨ Fitur Utama

-   ⚡ **Real-time update** menggunakan Laravel Echo + Pusher
-   🎛️ **Dashboard Petugas Loket** untuk memanggil, menambah, dan mengatur antrian
-   🖥️ **Display Publik** untuk menampilkan nomor antrian aktif dan riwayat nomor sebelumnya
-   🔔 **Animasi & notifikasi visual** ketika nomor baru dipanggil
-   📊 **Arsitektur modular** — mudah dikembangkan lebih lanjut (misal untuk suara otomatis, statistik, dll)

---

## 🧩 Teknologi yang Digunakan

| Komponen                  | Deskripsi                     |
| ------------------------- | ----------------------------- |
| **Laravel 11**            | Framework backend utama       |
| **Laravel Echo + Pusher** | Sistem broadcasting real-time |
| **Tailwind CSS**          | Styling responsif dan modern  |
| **Blade Template**        | Tampilan frontend             |
| **MySQL**                 | Database utama                |

---

## ⚙️ Instalasi & Setup

### Pusher | .env configuration

```bash
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=ap1

VITE_PUSHER_APP_KEY=${PUSHER_APP_KEY}
VITE_PUSHER_APP_CLUSTER=${PUSHER_APP_CLUSTER}
```

### Clone Repository

```bash
git clone https://github.com/faturrahman10/antrian-loket.git
cd antrian-loket
```
