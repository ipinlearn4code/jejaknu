
# Dokumentasi Aplikasi JEJAKNU - Jejaring Kabar Pemuda NU
![image](https://github.com/user-attachments/assets/dd91210e-054f-4be6-8d0a-63f036d811aa)
![image](https://github.com/user-attachments/assets/59114f7a-b55c-4723-a212-70d43909011d)


## Pendahuluan
JEJAKNU adalah sebuah aplikasi berbasis web yang dikembangkan dengan tujuan untuk mengelola informasi terkait Nahdlatul Ulama (NU), termasuk artikel, profil kader, acara, dan berita.

## Persyaratan Sistem
Sebelum menginstal dan menjalankan aplikasi, pastikan sistem Anda memenuhi persyaratan berikut:
- PHP 8.0 atau lebih baru
- Composer
- MySQL / MariaDB
- Node.js (jika menggunakan frontend tambahan)
- Web server (Apache/Nginx)

## Instalasi
1. Clone repositori:
   ```bash
   git clone https://github.com/ipinlearn4code/jejaknu.git
   cd jejaknu
   ```

2. Instal dependensi menggunakan Composer:
   ```bash
   composer install
   ```

3. Copy file `.env.example` menjadi `.env` dan atur konfigurasi database:
   ```bash
   cp .env.example .env
   ```

4. Edit file `.env` dan sesuaikan bagian berikut:
   ```ini
   database.default.hostname = localhost
   database.default.database = nama_database
   database.default.username = user_database
   database.default.password = password_database
   database.default.DBDriver = MySQLi
   ```

## Menggunakan Database Migrations
CodeIgniter 4 menyediakan fitur migrations untuk mengelola struktur database.

### Menjalankan Migrations
Untuk menjalankan migrations, gunakan perintah berikut:
```bash
php spark migrate
```
Ini akan mengeksekusi semua file migration yang terdapat dalam folder `app/Database/Migrations`.

### Menjalankan Seeder
Untuk mengisi database dengan data awal, gunakan seeder:
```bash
php spark db:seed CompleteSeeder
```
Pastikan `CompleteSeeder.php` sudah terisi dengan data yang dibutuhkan.

## Menjalankan Aplikasi
Setelah konfigurasi selesai, jalankan aplikasi dengan perintah:
```bash
php spark serve
```
Aplikasi akan berjalan di `http://localhost:8080`.

## Hak Akses & Role
Aplikasi ini memiliki beberapa peran pengguna, seperti Admin, Editor, dan User biasa. Setiap peran memiliki hak akses yang berbeda dalam mengelola konten.

## Kesimpulan
Dokumentasi ini mencakup langkah-langkah instalasi, konfigurasi database, penggunaan migration, dan menjalankan aplikasi. Jika terdapat kendala, silakan cek log error atau dokumentasi resmi CodeIgniter 4.

---
**Dikembangkan oleh:**
Alfan Miftahul Huda - Front End Engineer
Alfred Rajendra Wijaya - Back end Engineer
