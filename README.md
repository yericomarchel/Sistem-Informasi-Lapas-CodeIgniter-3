# Sistem Informasi Kunjungan Rutan (Versi CodeIgniter 3)

Aplikasi web ini dibangun untuk mendigitalisasi dan mengelola proses layanan kunjungan bagi warga binaan di Rutan. Tujuannya adalah untuk meningkatkan efisiensi, transparansi, dan akurasi data, baik untuk pengunjung maupun untuk staf Rutan.

Proyek ini dibangun sepenuhnya dari nol menggunakan framework **CodeIgniter 3** untuk mendemonstrasikan fundamental pengembangan web dengan arsitektur MVC (Model-View-Controller).

## ✨ Fitur-Fitur Utama

### **Untuk Pengunjung (Publik):**
- **Landing Page:** Halaman depan sebagai gerbang utama aplikasi.
- **Autentikasi:** Sistem registrasi dan login yang dibangun dari nol, lengkap dengan validasi dan hashing password.
- **Dashboard Personal:** Setiap pengunjung memiliki dashboard untuk melihat riwayat dan status pengajuan kunjungan mereka.
- **Pengajuan Kunjungan:** Formulir dinamis untuk mengajukan jadwal kunjungan, termasuk upload file (KTP).
- **Validasi Cerdas:** Sistem secara otomatis memvalidasi jadwal berdasarkan hari kerja, hari libur yang di-input admin, dan kuota kunjungan mingguan per warga binaan.
- **Bukti Kunjungan PDF:** Pengunjung dapat mengunduh bukti persetujuan kunjungan dalam format PDF yang resmi.

### **Untuk Staf Rutan (Admin):**
- **Panel Admin Aman:** Area admin terpisah yang dilindungi oleh sistem hak akses berbasis peran (role).
- **Layout Sidebar Profesional:** Navigasi yang mudah dan efisien untuk mengakses semua fitur admin.
- **Dashboard Informatif:** Menampilkan kartu statistik (pengajuan baru, jadwal hari ini) dan daftar tugas terbaru.
- **Manajemen Data Master (CRUD):** Fitur CRUD lengkap untuk mengelola data **Warga Binaan**, **Kamar/Blok**, dan **Hari Libur**.
- **Verifikasi Kunjungan:** Alur kerja untuk melihat detail pengajuan, termasuk foto KTP, dan melakukan aksi **Setujui** atau **Tolak**.
- **Laporan Periodik:** Fitur untuk membuat laporan kunjungan berdasarkan rentang tanggal dan mengekspornya ke format PDF.

## 🛠️ Teknologi yang Digunakan

- **Framework:** PHP 7.4+ dengan CodeIgniter 3.1.11+
- **Database:** MySQL
- **Frontend:** Bootstrap 4, jQuery
- **Library Eksternal:**
  - **DomPDF:** Untuk membuat file PDF.
  - **SweetAlert2:** Untuk notifikasi dan konfirmasi yang modern.
  - **DataTables.net:** Untuk tabel admin yang canggih (pencarian, sorting, paginasi).
  - **Flatpickr:** Untuk pemilih tanggal (datepicker) yang interaktif.

## 🚀 Panduan Instalasi Lokal

Berikut adalah cara untuk menjalankan proyek ini di komputermu sendiri.

### **Prasyarat**
- Web Server Lokal (XAMPP, Laragon, dll.) dengan **PHP 7.4+** dan **MySQL**.
- Git untuk cloning repository.

### **Langkah-langkah Instalasi**
1.  **Clone Repository:**
    ```bash
    git clone [URL_REPOSITORY_GITHUB_ANDA] simlvk-ci3
    ```

2.  **Pindahkan Folder:**
    Pindahkan folder `simlvk-ci3` ke dalam direktori web server Anda (`C:\xampp\htdocs\` atau `C:\laragon\www\`).

3.  **Buat Database:**
    Buka phpMyAdmin, buat sebuah database baru dengan nama `db_simlvk_ci3`.

4.  **Konfigurasi Aplikasi:**
    Buka file `application/config/config.php` dan atur `base_url`:
    ```php
    $config['base_url'] = 'http://localhost/simlvk-ci3/';
    ```
    Di file yang sama, atur `encryption_key`:
    ```php
    $config['encryption_key'] = 'IsiDengan32KarakterAcakApapunDisini!';
    ```
    Buka file `application/config/database.php` dan sesuaikan dengan koneksi database Anda:
    ```php
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'db_simlvk_ci3',
    ```

5.  **Membuat Tabel & Isi Data Awal (Seeder):**
    Proyek ini menggunakan seeder yang dijalankan via controller. Buka browser Anda dan akses URL berikut **satu kali**:
    ```
    http://localhost/simlvk-ci3/seed
    ```
    URL ini akan secara otomatis membuat semua tabel yang dibutuhkan dan mengisinya dengan data awal (akun admin, kamar, dan warga binaan).

6.  **Buat Folder Upload:**
    Di dalam folder utama proyek (`simlvk-ci3`), buat sebuah folder baru bernama `uploads`. Di dalamnya, buat lagi folder `ktp`. Pastikan folder ini memiliki izin tulis (writable).

7.  **Selesai!**
    Akses `http://localhost/simlvk-ci3/` di browser Anda. Aplikasi sudah siap digunakan.

### **Akun Default**

Setelah menjalankan seeder, Anda bisa login menggunakan akun default berikut:
* **Role Staf/Admin:**
    * **Email:** `staf@rutan.com`
    * **Password:** `password123`
* **Role Pengunjung:**
    * **Email:** `pengunjung1@example.com`
    * **Password:** `password123`
