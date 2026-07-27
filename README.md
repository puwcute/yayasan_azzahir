# Yayasan Azzahir Mojosari

Website resmi **Yayasan Azzahir** — lembaga pendidikan Islam terpadu yang mengelola RA, MI, MTs, dan Pondok Pesantren Modern di Mojosari.

## 🚀 Fitur

- **Halaman Publik**: Beranda, Profil, Berita, Pendaftaran, Saran & Masukan
- **Admin Panel**: Dashboard, Kelola Berita, Data Pendaftaran, Pesan Masuk, Pengaturan
- **Multi-Jenjang**: RA · MI · MTs · Pondok Pesantren
- **Upload Gambar**: Logo, Hero, Foto Profil, Galeri Kegiatan

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Database**: MySQL
- **Frontend**: Blade + CSS Custom (tanpa framework CSS)
- **Icons**: Font Awesome 6

## 📋 Prasyarat

- PHP 8.2+
- Composer
- MySQL
- Node.js (untuk Vite/assets)

## ⚙️ Instalasi Lokal

```bash
# Clone repository
git clone https://github.com/puwcute/yayasan_azzahir.git
cd yayasan_azzahir

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Jalankan migrasi & seeder
php artisan migrate
php artisan db:seed

# Storage link (untuk upload gambar)
php artisan storage:link

# Jalankan development server
php artisan serve
npm run dev
```

## 🔐 Admin Panel

| Akun | Nilai |
|------|-------|
| **URL** | `/admin/login` |
| **Username** | `admin` |
| **Password** | `admin123` |
