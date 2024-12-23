# Sistem Informasi Inventori dan Keanggotaan
### Identitas
- Nama: CHANDRA BUDI WIJAYA
- NIM: 122140093
- Mata Kuliah: PEMROGRAMAN WEB RA

## Deskripsi Proyek
Sistem informasi berbasis web untuk mengelola inventori dan keanggotaan dengan fitur autentikasi pengguna.

## Fitur Utama
1. **Sistem Autentikasi**
   - Login pengguna
   - Logout
   - Manajemen sesi

2. **Manajemen Inventori**
   - Daftar inventori
   - Tambah inventori baru
   - Edit inventori
   - Hapus inventori

3. **Manajemen Keanggotaan**
   - Daftar anggota
   - Pendaftaran anggota baru
   - Edit data anggota
   - Hapus data anggota

4. **Dashboard**
   - Tampilan overview sistem
   - Statistik dan informasi penting

## Struktur Folder
```
assets/
├── css/                    # File-file stylesheet
│   ├── form.css           # Style untuk form
│   ├── inventory.css      # Style untuk halaman inventori
│   ├── login.css         # Style untuk halaman login
│   ├── membership.css     # Style untuk halaman keanggotaan
│   └── style.css         # Style umum
├── img/                   # Folder gambar
│   └── bg1.jpg           # Background image
└── js/
    └── script.js         # File JavaScript

config/                    # Konfigurasi sistem
├── Database.php          # Konfigurasi database
├── functions.php         # Fungsi-fungsi helper
└── session.php          # Manajemen sesi

controllers/              # Controller aplikasi
├── auth/                # Controller autentikasi
│   ├── logout.php       # Proses logout
│   └── process_login.php # Proses login
├── inventory/           # Controller inventori
│   ├── delete_inventory.php
│   └── save_inventory.php
└── membership/          # Controller keanggotaan
    ├── delete_membership.php
    └── save_membership.php

models/                  # Model aplikasi
└── part.php            # Model komponen

views/                   # Tampilan aplikasi
├── inventory/          # View inventori
│   ├── edit.php
│   ├── form.php
│   └── list.php
├── layouts/            # Layout template
│   ├── footer.php
│   └── header.php
├── membership/         # View keanggotaan
│   ├── edit.php
│   ├── form.php
│   └── list.php
├── dashboard.php       # Halaman dashboard
└── index.php          # Halaman utama

sql/                    # File database
└── database.sql       # Skema dan data awal
```

## Teknologi yang Digunakan
- PHP
- MySQL
- JavaScript
- CSS
- HTML

## Instalasi
1. Clone repository ini
2. Import database.sql ke MySQL
3. Konfigurasi koneksi database di config/Database.php
4. Jalankan aplikasi di web server

## Penggunaan
1. Akses halaman login
2. Masuk menggunakan kredensial yang valid
3. Kelola inventori dan keanggotaan melalui menu yang tersedia
4. Logout setelah selesai menggunakan sistem
