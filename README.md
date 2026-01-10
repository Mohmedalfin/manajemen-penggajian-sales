# 🚀 Sistem Informasi Manajemen Penggajian Sales (SIM-Payroll)

![License](https://img.shields.io/badge/license-MIT-blue.svg) ![Laravel](https://img.shields.io/badge/Laravel-10.x-red) ![Tailwind CSS](https://img.shields.io/badge/Tailwind-CSS-38B2AC) ![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow)

**Sistem Informasi Manajemen Penggajian Sales** adalah aplikasi berbasis web yang dirancang untuk mempermudah proses pencatatan penjualan, monitoring stok barang, serta otomatisasi perhitungan komisi dan penggajian sales secara efisien.

---

## 🛠️ Teknologi Utama

Project ini dibangun menggunakan stack teknologi modern untuk memastikan performa yang cepat dan tampilan yang responsif:

* **Laravel (Backend):** Menggunakan framework PHP Laravel yang handal untuk menangani logika bisnis, keamanan (auth), dan manajemen database.
* **Tailwind CSS (Styling):** Framework CSS utility-first digunakan untuk mendesain antarmuka (UI) yang modern, bersih, dan responsif di berbagai perangkat.
* **JavaScript (Interactivity):** Menangani interaksi dinamis pada frontend, validasi form, serta visualisasi data menggunakan library chart.
* **MySQL (Database):** Penyimpanan data relasional untuk transaksi, user, dan inventaris.

---

## ✨ Fitur Sistem

Sistem ini memiliki dua aktor utama dengan hak akses berbeda:

### 👨‍💼 Administrator (Admin)
* **Dashboard Analitik:** Grafik visual (Chart.js) untuk penjualan, total transaksi, unit terjual, revenue, dan Leaderboard Top Sales.
* **Validasi Transaksi:** Fitur **Approve** (Komisi cair) atau **Reject** untuk setiap laporan penjualan dari sales.
* **Manajemen Sales & Auto-Notif WA:**
    * CRUD Data Sales.
    * **Fitur Unggulan:** Saat Admin input sales baru, sistem **otomatis mengirim Username & Password** ke WhatsApp sales tersebut.
* **Manajemen Barang:** Monitoring stok, harga satuan, dan update unit barang.
* **Laporan Gaji (Payroll):** Kalkulasi otomatis profit, pengeluaran gaji, total komisi, dan fitur **Export to Excel**.

### 🧑‍💼 Sales (Pengguna)
* **Dashboard Performa:** Statistik pribadi, Line Chart (Target vs Realisasi), dan status transaksi (Pending/Approved).
* **Input Penjualan:** Form input barang terjual disertai **Upload Bukti Foto** (struk/barang).
* **Profil & Keamanan:** Edit biodata diri dan fitur ganti password untuk keamanan akun.

---

## 💻 Panduan Instalasi (Local Development)

Ikuti langkah-langkah berikut agar project dapat berjalan di komputer Anda.

### Prasyarat
* PHP >= 8.1
* Composer
* MySQL
* Node.js & NPM

### Langkah-langkah Instalasi

1.  **Clone Repository**
    Download source code project ini:
    ```bash
    git clone [https://github.com/username-anda/nama-repo-anda.git](https://github.com/username-anda/nama-repo-anda.git)
    cd nama-repo-anda
    ```

2.  **Install Dependencies (Backend)**
    Install library PHP yang dibutuhkan menggunakan Composer:
    ```bash
    composer install
    ```

3.  **Setup Environment File**
    Duplikat file konfigurasi `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```

4.  **Konfigurasi Database & API**
    Buka file `.env` di text editor, lalu atur koneksi database dan API WA:
    
    * **Database:** (Buat database kosong terlebih dahulu di phpMyAdmin)
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nama_database_kamu
        DB_USERNAME=root
        DB_PASSWORD=
        ```
    * **WhatsApp Gateway:** (Sesuaikan dengan provider API yang digunakan)
        ```env
        WA_API_URL=[https://api.whatsapp.com/send](https://api.whatsapp.com/send)
        WA_API_KEY=your_api_key_here
        ```

5.  **Generate Application Key**
    Buat key enkripsi keamanan untuk Laravel:
    ```bash
    php artisan key:generate
    ```

6.  **Migrasi Database & Seeder**
    Jalankan perintah ini untuk membuat tabel dan mengisi data akun Admin default:
    ```bash
    php artisan db:seed --class=Userseed
    ```

7.  **Setup Storage Link**
    **PENTING:** Jalankan ini agar foto bukti transaksi bisa diakses publik:
    ```bash
    php artisan storage:link
    ```

8.  **Install & Compile Dependencies (Frontend)**
    Install package Tailwind/JS dan compile asset:
    ```bash
    npm install && npm run build
    ```

9.  **Jalankan Server**
    Nyalakan server lokal Laravel:
    ```bash
    php artisan serve
    ```

10. **Selesai!**
    Buka browser dan akses: `http://localhost:8000`

---

## 🔐 Akun Default (Testing)

Gunakan akun ini untuk login pertama kali setelah menjalankan seeder:

| Role | Username / Email | Password |
| :--- | :--- | :--- |
| **Admin** | `admin` | `password` |
| Login **Sales** mengikuti sales yang dibuat |

---

## 🤝 Kontribusi

Project ini adalah Open Source. Jika ingin berkontribusi:
1.  Fork repository ini.
2.  Buat branch fitur (`git checkout -b fitur-baru`).
3.  Commit perubahan (`git commit -m 'Menambahkan fitur keren'`).
4.  Push ke branch (`git push origin fitur-baru`).
5.  Buat Pull Request.

---

## 📄 Lisensi

[MIT License](https://opensource.org/licenses/MIT)
