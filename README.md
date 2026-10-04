## Instalasi dan Konfigurasi

### 1. Clone Repository

Jika project tersedia di repository Git, jalankan:

```bash
git clone <URL_REPOSITORY>
cd kamibantu
```

Ganti `<URL_REPOSITORY>` dengan URL repository KamiBantu.

Jika project sudah tersedia di komputer:

```bash
cd ~/projects/kamibantu
```

### 2. Instal Dependency Backend

Instal seluruh dependency PHP menggunakan Composer:

```bash
composer install
```

### 3. Instal Dependency Frontend

Instal dependency JavaScript:

```bash
npm install
```

### 4. Konfigurasi Environment

Buat file `.env` dari file `.env.example`:

```bash
cp .env.example .env
```

Kemudian sesuaikan konfigurasi pada `.env`, terutama konfigurasi database.

Contoh konfigurasi MySQL:

```dotenv
APP_NAME=KamiBantu
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kamibantu
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

Sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan konfigurasi MySQL lokal.

### 5. Generate Application Key

Laravel membutuhkan application key untuk proses enkripsi aplikasi.

Jalankan:

```bash
php artisan key:generate
```

Jika berhasil, Laravel akan mengisi nilai `APP_KEY` pada file `.env`.

Contohnya:

```dotenv
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

### 6. Buat Database

Pastikan MySQL atau MariaDB sudah berjalan, kemudian buat database `kamibantu`.

Contoh menggunakan MySQL/MariaDB:

```bash
mysql -u root -p
```

Kemudian jalankan:

```sql
CREATE DATABASE kamibantu
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

Keluar dari MySQL:

```sql
EXIT;
```

Jika database sudah tersedia, langkah ini tidak perlu dilakukan lagi.

### 7. Clear Configuration Cache

Setelah mengubah `.env`, bersihkan konfigurasi Laravel agar perubahan environment terbaca:

```bash
php artisan config:clear
```

### 8. Jalankan Database Migration

Jalankan migration untuk membuat tabel-tabel yang dibutuhkan KamiBantu:

```bash
php artisan migrate
```

Jika project menyediakan database seeder dan membutuhkan data awal, jalankan:

```bash
php artisan db:seed
```

> **Catatan:** Jangan menjalankan `php artisan migrate:fresh` pada database yang sudah berisi data penting karena perintah tersebut akan menghapus seluruh tabel sebelum menjalankan migration kembali.

### 9. Buat Storage Link

Jika aplikasi menggunakan file yang disimpan melalui Laravel Storage, jalankan:

```bash
php artisan storage:link
```

### 10. Jalankan Project

Setelah seluruh proses instalasi selesai, jalankan:

```bash
composer run dev
```

Perintah tersebut menjalankan beberapa proses development KamiBantu, yaitu:

* Laravel development server
* Queue worker
* Laravel Pail untuk melihat log
* Vite development server

Kemudian buka:

```text
http://127.0.0.1:8000
```

Biarkan terminal tetap berjalan selama aplikasi digunakan.

Untuk menghentikan seluruh proses development, tekan:

```text
Ctrl + C
```

## Menjalankan Project Secara Terpisah

Jika ingin menjalankan setiap service secara terpisah, gunakan terminal yang berbeda.

### Laravel Server

```bash
php artisan serve
```

### Vite

```bash
npm run dev
```

### Queue Worker

Jika aplikasi menggunakan queue:

```bash
php artisan queue:listen --tries=1
```

### Laravel Pail

Untuk melihat log aplikasi secara realtime:

```bash
php artisan pail --timeout=0
```

## Urutan Instalasi Singkat

Untuk instalasi project yang sudah dikonfigurasi, urutannya adalah:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan config:clear
php artisan migrate
php artisan storage:link
composer run dev
```

Pastikan database MySQL `kamibantu` sudah dibuat dan konfigurasi database pada `.env` sudah benar sebelum menjalankan:

```bash
php artisan migrate
```

## Pemecahan Masalah

### `vendor/autoload.php` tidak ditemukan

Jalankan:

```bash
composer install
```

### `vite: command not found`

Jalankan:

```bash
npm install
```

Kemudian:

```bash
composer run dev
```

### `No application encryption key has been specified`

Jalankan:

```bash
php artisan key:generate
```

### Database tidak dapat diakses

Periksa konfigurasi berikut pada `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kamibantu
DB_USERNAME=root
DB_PASSWORD=
```

Kemudian bersihkan konfigurasi:

```bash
php artisan config:clear
```

Pastikan MySQL/MariaDB sedang berjalan dan database `kamibantu` sudah dibuat.

### Laravel masih menggunakan konfigurasi database lama

Jalankan:

```bash
php artisan config:clear
php artisan cache:clear
```

Kemudian coba kembali:

```bash
php artisan migrate
```
