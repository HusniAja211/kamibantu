# KamiBantu — Platform Manajemen Kegiatan Relawan

KamiBantu adalah platform berbasis web yang dirancang untuk menghubungkan **relawan** dan **penyelenggara kegiatan sosial** dalam satu sistem yang transparan, adil, dan terstruktur.

Aplikasi ini dirancang untuk memastikan bahwa partisipasi relawan dan kredibilitas penyelenggara dinilai berdasarkan **konsistensi dan penyelesaian nyata**, bukan sekadar jumlah kegiatan yang diikuti atau dibuat.

---

## Daftar Isi

* [Tentang KamiBantu](#tentang-kamibantu)
* [Fitur Utama](#fitur-utama)
* [Sistem Reputasi](#sistem-reputasi)
* [Aturan Penyelesaian Kegiatan](#aturan-penyelesaian-kegiatan)
* [Teknologi yang Digunakan](#teknologi-yang-digunakan)
* [Tujuan Pengembangan](#tujuan-pengembangan)
* [Persyaratan Sistem](#persyaratan-sistem)
* [Instalasi](#instalasi)
* [Konfigurasi Environment](#konfigurasi-environment)
* [Database](#database)
* [Menjalankan Project](#menjalankan-project)
* [Menjalankan Service Secara Terpisah](#menjalankan-service-secara-terpisah)
* [Pemecahan Masalah](#pemecahan-masalah)

---

## Tentang KamiBantu

Dalam kegiatan sosial, jumlah kegiatan yang diikuti atau diselenggarakan belum tentu menunjukkan tingkat tanggung jawab seseorang.

Seorang relawan dapat mendaftar banyak kegiatan tetapi sering tidak menyelesaikannya. Begitu pula seorang penyelenggara dapat membuat banyak kegiatan tetapi tidak berhasil mengelolanya sampai selesai.

KamiBantu menggunakan pendekatan yang berfokus pada **completion rate** untuk memberikan gambaran reputasi berdasarkan aktivitas yang benar-benar diselesaikan.

Dengan pendekatan tersebut, KamiBantu bertujuan menciptakan ekosistem kegiatan sosial yang lebih:

* Transparan
* Adil
* Terstruktur
* Akuntabel

---

## Fitur Utama

### 1. Manajemen Kegiatan

Penyelenggara dapat membuat dan mengelola kegiatan sosial, termasuk informasi kegiatan, lokasi, dan status kegiatan.

Kegiatan dapat memiliki beberapa status sesuai dengan proses pelaksanaannya, mulai dari pendaftaran hingga penyelesaian.

### 2. Pendaftaran Relawan

Relawan dapat menemukan kegiatan yang tersedia dan mendaftarkan diri sebagai peserta.

Sistem menyimpan status partisipasi relawan sehingga aktivitas mereka dapat dilacak secara terstruktur.

### 3. Status Partisipasi

Setiap pendaftaran relawan memiliki status partisipasi yang digunakan untuk menentukan apakah seorang relawan benar-benar mengikuti dan menyelesaikan kegiatan.

Hal ini menjadi salah satu dasar perhitungan reputasi relawan.

### 4. Konfirmasi Penyelesaian

Penyelesaian kegiatan tidak hanya ditentukan berdasarkan waktu atau status kegiatan.

Sistem menggunakan konfirmasi partisipasi relawan sebagai salah satu dasar untuk menentukan apakah kegiatan dapat dianggap berhasil diselesaikan.

### 5. Sistem Reputasi Otomatis

Reputasi relawan dan penyelenggara dihitung oleh sistem berdasarkan aktivitas yang berhasil diselesaikan.

Tidak terdapat sistem rating manual yang memungkinkan pengguna memberikan nilai secara langsung kepada pengguna lain.

### 6. Aturan Penyelesaian 80%

KamiBantu menggunakan ambang batas partisipasi untuk menentukan apakah sebuah kegiatan memenuhi syarat penyelesaian.

Kegiatan dapat dinyatakan berhasil apabila tingkat partisipasi memenuhi **80% dari peserta yang terdaftar**.

### 7. Dashboard

Dashboard menyediakan informasi yang relevan dengan peran pengguna, seperti:

* Kegiatan yang tersedia
* Kegiatan yang diikuti
* Kegiatan yang dibuat
* Status kegiatan
* Informasi reputasi

### 8. Profil Pengguna

Pengguna dapat melihat informasi profil serta riwayat aktivitas yang berkaitan dengan kegiatan sosial.

### 9. Kontrol Akses Berbasis Peran

KamiBantu memiliki dua peran utama:

**Relawan**

* Melihat kegiatan
* Mendaftar kegiatan
* Mengikuti kegiatan
* Mengonfirmasi partisipasi
* Melihat riwayat dan reputasi

**Penyelenggara**

* Membuat kegiatan
* Mengelola kegiatan
* Melihat peserta
* Memantau partisipasi
* Menyelesaikan kegiatan berdasarkan aturan sistem

---

## Sistem Reputasi

KamiBantu menggunakan sistem reputasi berbasis **completion rate** dengan persyaratan minimum aktivitas (*hybrid system*).

Pendekatan ini digunakan agar reputasi tidak hanya ditentukan oleh jumlah aktivitas, tetapi juga oleh **konsistensi dalam menyelesaikan aktivitas tersebut**.

### Reputasi Relawan

Reputasi relawan mempertimbangkan:

* Jumlah kegiatan yang diikuti
* Jumlah kegiatan yang berhasil diselesaikan
* Completion rate
* Minimum aktivitas sebagai persyaratan penilaian

Secara konseptual:

```text
Completion Rate =
Kegiatan yang Diselesaikan
--------------------------
Kegiatan yang Diikuti
× 100%
```

Dengan demikian, relawan yang mengikuti banyak kegiatan tetapi sering tidak menyelesaikannya tidak otomatis memiliki reputasi tinggi.

### Reputasi Penyelenggara

Reputasi penyelenggara mempertimbangkan kegiatan yang berhasil diselesaikan.

Hal ini membuat penyelenggara tidak hanya dinilai berdasarkan jumlah kegiatan yang dibuat, tetapi juga berdasarkan keberhasilan pelaksanaan kegiatan tersebut.

### Tanpa Rating Manual

KamiBantu tidak menggunakan input rating manual seperti:

```text
★★★★★
```

Reputasi dihitung secara otomatis berdasarkan data aktivitas.

Pendekatan ini bertujuan mengurangi:

* Manipulasi rating
* Penilaian subjektif
* Rating berdasarkan hubungan personal
* Inflasi reputasi

---

## Aturan Penyelesaian Kegiatan

KamiBantu menggunakan **80% rule** sebagai salah satu mekanisme untuk menentukan keberhasilan kegiatan.

Contoh:

Sebuah kegiatan memiliki:

```text
Total peserta terdaftar : 20 orang
Peserta yang memenuhi syarat : 17 orang
```

Maka:

```text
17 / 20 × 100% = 85%
```

Karena:

```text
85% >= 80%
```

kegiatan memenuhi syarat tingkat partisipasi untuk dianggap berhasil diselesaikan.

Sebaliknya, apabila hanya 14 dari 20 peserta yang memenuhi syarat:

```text
14 / 20 × 100% = 70%
```

Maka:

```text
70% < 80%
```

sehingga kegiatan tidak memenuhi ambang batas 80%.

Aturan ini digunakan untuk menjaga agar status penyelesaian kegiatan tidak hanya bergantung pada keputusan subjektif penyelenggara.

---

## Teknologi yang Digunakan

| Teknologi         | Penggunaan                            |
| ----------------- | ------------------------------------- |
| **Laravel**       | Backend dan business logic            |
| **Blade**         | Template engine                       |
| **MySQL**         | Database                              |
| **Tailwind CSS**  | User interface dan styling            |
| **Vite**          | Development server dan asset bundling |
| **OpenStreetMap** | Data dan visualisasi lokasi           |
| **Nominatim**     | Geocoding dan pencarian lokasi        |

### Laravel

Laravel digunakan sebagai framework utama untuk:

* Routing
* Controller
* Model dan Eloquent ORM
* Authentication
* Authorization
* Validation
* Database migration
* Business logic

### Blade

Blade digunakan untuk membangun antarmuka server-side yang terintegrasi dengan Laravel.

### MySQL

MySQL digunakan sebagai database utama untuk menyimpan data seperti:

* Pengguna
* Kegiatan
* Pendaftaran relawan
* Status partisipasi
* Data reputasi
* Informasi lainnya yang berkaitan dengan kegiatan

### OpenStreetMap dan Nominatim

OpenStreetMap digunakan sebagai sumber data peta, sedangkan Nominatim digunakan untuk kebutuhan pencarian atau geocoding lokasi kegiatan.

---

## Tujuan Pengembangan

KamiBantu dikembangkan sebagai **proyek pembelajaran dan kompetisi** dengan fokus pada pengembangan sistem yang memiliki aturan bisnis yang jelas.

Tujuan utama pengembangan KamiBantu adalah:

### 1. Keadilan Sistem Reputasi

Membangun sistem reputasi yang tidak hanya mengandalkan jumlah aktivitas, tetapi mempertimbangkan konsistensi dan penyelesaian kegiatan.

### 2. Transparansi Partisipasi

Menyediakan informasi status partisipasi yang jelas sehingga proses kegiatan dapat dipantau oleh pihak yang terkait.

### 3. Akuntabilitas

Mendorong relawan dan penyelenggara untuk menyelesaikan tanggung jawab masing-masing.

### 4. Arsitektur yang Mudah Dikembangkan

Membangun struktur aplikasi yang memungkinkan fitur baru dikembangkan tanpa mengubah keseluruhan sistem.

---

# Instalasi

## Persyaratan Sistem

Pastikan perangkat telah memiliki:

* PHP
* Composer
* Node.js
* npm
* MySQL atau MariaDB
* Git

Versi PHP dan dependency lainnya harus mengikuti persyaratan yang terdapat pada `composer.json`.

---

## 1. Clone Repository

Jika project berasal dari repository Git:

```bash
git clone <URL_REPOSITORY>
cd kamibantu
```

Jika project sudah tersedia secara lokal:

```bash
cd ~/projects/kamibantu
```

---

## 2. Install Dependency Laravel

Jalankan:

```bash
composer install
```

Perintah ini akan menginstal seluruh dependency PHP yang dibutuhkan oleh project.

---

## 3. Install Dependency Frontend

Jalankan:

```bash
npm install
```

Perintah ini akan menginstal dependency JavaScript yang tercantum pada `package.json`, termasuk Vite.

---

## 4. Membuat File Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Jika `.env` sudah tersedia, tidak perlu menjalankan perintah tersebut.

---

## 5. Konfigurasi Database

Buka file `.env`:

```bash
nano .env
```

Kemudian sesuaikan konfigurasi database:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kamibantu
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password dengan konfigurasi MySQL/MariaDB pada komputer.

---

## 6. Membuat Application Key

Laravel membutuhkan `APP_KEY` untuk proses enkripsi aplikasi.

Jalankan:

```bash
php artisan key:generate
```

Jika berhasil, Laravel akan mengisi `APP_KEY` pada file `.env`.

Contoh:

```dotenv
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

**Jangan membagikan nilai `APP_KEY` ke publik.**

---

## 7. Membuat Database

Pastikan MySQL atau MariaDB sedang berjalan.

Kemudian buat database:

```sql
CREATE DATABASE kamibantu
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

Jika menggunakan terminal MySQL:

```bash
mysql -u root -p
```

Kemudian:

```sql
CREATE DATABASE kamibantu
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

Keluar:

```sql
EXIT;
```

---

## 8. Clear Configuration

Setelah konfigurasi `.env` selesai, jalankan:

```bash
php artisan config:clear
```

Hal ini memastikan Laravel membaca konfigurasi environment terbaru.

---

## 9. Migration Database

Jalankan migration untuk membuat tabel-tabel database:

```bash
php artisan migrate
```

Jika project menyediakan seeder dan membutuhkan data awal:

```bash
php artisan db:seed
```

Atau jika migration dan seeder ingin dijalankan sekaligus:

```bash
php artisan migrate --seed
```

> **Perhatian:** Jangan menggunakan `php artisan migrate:fresh` pada database yang berisi data penting karena perintah tersebut akan menghapus seluruh tabel dan membuatnya kembali.

---

## 10. Storage Link

Jika aplikasi menggunakan Laravel Storage untuk file publik, jalankan:

```bash
php artisan storage:link
```

---

# Menjalankan Project

Setelah seluruh proses instalasi selesai, jalankan:

```bash
composer run dev
```

Perintah tersebut menjalankan beberapa proses development sekaligus:

* Laravel development server
* Queue worker
* Laravel Pail
* Vite development server

Jika berhasil, buka:

```text
http://127.0.0.1:8000
```

Biarkan terminal tetap berjalan selama aplikasi digunakan.

Untuk menghentikan server:

```text
Ctrl + C
```

---

# Menjalankan Service Secara Terpisah

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

```bash
php artisan queue:listen --tries=1
```

### Laravel Pail

```bash
php artisan pail --timeout=0
```

---

# Urutan Instalasi Singkat

Untuk mempermudah setup project:

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

Pastikan database `kamibantu` sudah dibuat dan konfigurasi database pada `.env` sudah benar sebelum menjalankan migration.

---

# Pemecahan Masalah

## `vendor/autoload.php` tidak ditemukan

Jalankan:

```bash
composer install
```

Kemudian coba kembali:

```bash
composer run dev
```

## `vite: command not found`

Jalankan:

```bash
npm install
```

Kemudian:

```bash
composer run dev
```

## `No application encryption key has been specified`

Jalankan:

```bash
php artisan key:generate
```

## Database tidak dapat diakses

Periksa konfigurasi `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kamibantu
DB_USERNAME=root
DB_PASSWORD=
```

Kemudian:

```bash
php artisan config:clear
```

Pastikan MySQL/MariaDB sedang berjalan dan database `kamibantu` sudah tersedia.

## Laravel masih menggunakan konfigurasi lama

Jalankan:

```bash
php artisan config:clear
php artisan cache:clear
```

Kemudian coba kembali:

```bash
php artisan migrate
```

---

## Struktur Proses Pengembangan

Secara umum, alur pengembangan KamiBantu adalah:

```text
Pengguna
   │
   ▼
Laravel + Blade
   │
   ├── Relawan
   │     ├── Melihat kegiatan
   │     ├── Mendaftar
   │     ├── Berpartisipasi
   │     └── Konfirmasi
   │
   └── Penyelenggara
         ├── Membuat kegiatan
         ├── Mengelola peserta
         └── Menyelesaikan kegiatan
                    │
                    ▼
             Sistem Partisipasi
                    │
                    ▼
              80% Rule
                    │
                    ▼
          Status Penyelesaian
                    │
                    ▼
           Sistem Reputasi
```

---

## Pengembangan Selanjutnya

KamiBantu masih dapat dikembangkan lebih lanjut, terutama pada:

* Penyempurnaan algoritma reputasi.
* Sistem verifikasi kegiatan.
* Notifikasi kegiatan.
* Riwayat aktivitas pengguna yang lebih lengkap.
* Peningkatan keamanan dan authorization.
* Pengembangan API.
* Peningkatan pengalaman pengguna.
* Pengembangan fitur pencarian dan filter kegiatan.

---

## Lisensi

Project ini dikembangkan sebagai proyek pembelajaran dan kompetisi.

---
