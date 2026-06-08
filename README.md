# FacilityCare - Sistem Pelaporan Kerusakan Fasilitas Kampus

## Deskripsi Project

FacilityCare merupakan aplikasi berbasis Laravel 13 yang digunakan untuk mengelola data fasilitas kampus serta pelaporan kerusakan fasilitas.

Sistem ini membantu proses pencatatan fasilitas, pelaporan kerusakan, pemantauan status perbaikan, dan pembuatan laporan dalam format PDF maupun Excel.

---

## Fitur Utama

### Dashboard

* Total Kategori Fasilitas
* Total Fasilitas
* Total Laporan Kerusakan
* Statistik Status Laporan
* Grafik Ringkasan Laporan
* 5 Laporan Terbaru

### Kategori Fasilitas

* Tambah Kategori
* Lihat Kategori
* Edit Kategori
* Hapus Kategori

### Fasilitas

* Tambah Fasilitas
* Lihat Fasilitas
* Edit Fasilitas
* Hapus Fasilitas
* Filter Kondisi
* Export PDF
* Export Excel

### Laporan Kerusakan

* Tambah Laporan
* Upload Foto Kerusakan
* Edit Laporan
* Hapus Laporan
* Update Status Menggunakan AJAX
* Export PDF
* Export Excel

### Hak Akses

#### Admin

* Mengelola Kategori Fasilitas
* Mengelola Fasilitas
* Mengelola Laporan Kerusakan
* Mengakses Dashboard

#### Staff

* Melihat Data Fasilitas
* Mengelola Laporan Kerusakan
* Mengakses Dashboard

---

## Teknologi Yang Digunakan

* Laravel 13
* PHP 8.4
* MySQL
* Laravel Breeze
* Tailwind CSS
* DomPDF
* Laravel Excel
* AJAX (Fetch API)

---

## Struktur Database

### users

* id
* name
* email
* password
* role

### kategori_fasilitas

* id
* nama_kategori
* deskripsi

### fasilitas

* id
* kategori_fasilitas_id
* kode_fasilitas
* nama_fasilitas
* lokasi
* kondisi
* deskripsi

### laporan_kerusakan

* id
* fasilitas_id
* pelapor
* judul_laporan
* deskripsi_kerusakan
* foto
* status
* tanggal_lapor

---

## Cara Instalasi

### Clone Repository

```bash
git clone https://github.com/ritoru-cmd/FacilityCare.git
```

### Masuk Ke Folder Project

```bash
cd FacilityCare
```

### Install Dependency PHP

```bash
composer install
```

### Install Dependency Frontend

```bash
npm install
```

### Copy Environment

```bash
copy .env.example .env
```

atau Linux:

```bash
cp .env.example .env
```

### Generate Key

```bash
php artisan key:generate
```

### Buat Database

Buat database baru di MySQL.

Contoh:

```sql
facilitycare
```

Kemudian sesuaikan konfigurasi pada file `.env`.

### Migrasi dan Seeder

```bash
php artisan migrate:fresh --seed
```

### Storage Link

```bash
php artisan storage:link
```

### Jalankan Vite

```bash
npm run dev
```

### Jalankan Server

```bash
php artisan serve
```

---

## Akun Login Seeder

### Admin

Email:

```text
admin@kampus.test
```

Password:

```text
password123
```

### Staff

Email:

```text
staff@kampus.test
```

Password:

```text
password123
```

---

## Repository

https://github.com/ritoru-cmd/FacilityCare

---

## Author

Project UTS Pemrograman Web 2

Studi Kasus Nomor 8

**FacilityCare - Sistem Pelaporan Kerusakan Fasilitas Kampus**
