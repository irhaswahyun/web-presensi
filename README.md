# PresensiGuru

PresensiGuru adalah aplikasi berbasis web untuk memudahkan proses presensi guru di sekolah. Sistem ini dibangun menggunakan Laravel, framework PHP yang modern dan robust, untuk mendukung manajemen data presensi secara efisien.

## Fitur
- **Manajemen Presensi**: Guru dapat melakukan presensi hanya dengan klik tombol 'Presensi Masuk' saat tiba disekolah dan 'Presensi Pulang' saat akan meninggalkan sekolah/waktu mengajar telah selesai secara langsung melalui halaman yang telah disediakan.
- **Dashboard Admin**: Admin dapat melihat dan memonitoring data presensi guru.
- **Admin - Kelola Data**: Admin dapat CRUD pada data guru. Dan data yang diinputkan admin akan digunakan user/guru untuk login ke sistem presensi.

## Teknologi yang Digunakan
- **Laravel**: Sebagai framework backend PHP.
- **Laravel Jetstream**: Untuk autentikasi dan manajemen sesi.
- **MySQL**: Untuk penyimpanan data.
- **JavaScript**: Untuk logika interaktif pada bagian front-end.

## Instalasi
Berikut langkah-langkah untuk menginstal dan menjalankan proyek ini di lokal:

1. Clone repository ini ke dalam direktori lokal Anda:
    ```bash
    git clone https://github.com/username/project-presensiguru.git
    ```

2. Masuk ke dalam direktori proyek:
    ```bash
    cd project-presensiguru
    ```

3. Install dependencies menggunakan Composer:
    ```bash
    composer install
    ```

4. Buat file `.env` dan sesuaikan pengaturan basis data Anda:
    ```bash
    cp .env.example .env
    ```

5. Generate application key:
    ```bash
    php artisan key:generate
    ```

6. Migrasi dan seeding database:
    ```bash
    php artisan migrate --seed
    ```

7. Jalankan aplikasi:
    ```bash
    php artisan serve
    ```

8. Akses aplikasi melalui browser:
    ```
    http://localhost:8000
    ```

## Pengguna Admin
- **Username**: admin@gmail.com
- **Password**: password



