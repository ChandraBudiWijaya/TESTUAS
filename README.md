# Sistem Informasi Inventori dan Keanggotaan Anugerah Motor

## Identitas
- Nama: CHANDRA BUDI WIJAYA
- NIM: 122140093
- Mata Kuliah: PEMROGRAMAN WEB RA

# info Login
## *Username:* admin
## *Password:* password123

## Struktur Folder
```
TESTUAS/
├── assets/
│   ├── css/
│   │   ├── form.css        # Styling untuk form
│   │   ├── inventory.css   # Styling khusus inventori
│   │   ├── login.css      # Styling halaman login
│   │   ├── membership.css  # Styling khusus membership
│   │   └── style.css      # Styling umum
│   ├── img/
│   │   └── bg1.jpg        # Background image
│   └── js/
│       └── script.js      # File JavaScript utama
│
├── config/
│   ├── Database.php       # Konfigurasi database
│   ├── functions.php      # Helper functions
│   └── session.php        # Manajemen session
│
├── controllers/
│   ├── auth/
│   │   ├── logout.php     # Proses logout
│   │   └── process_login.php # Proses login
│   ├── inventory/
│   │   ├── delete_inventory.php
│   │   └── save_inventory.php
│   └── membership/
│       ├── delete_membership.php
│       └── save_membership.php
│
├── models/
│   └── part.php          # Model untuk komponen
│
├── sql/
│   └── database.sql      # File SQL database
│
├── views/
│   ├── inventory/
│   │   ├── edit.php      # Form edit inventori
│   │   ├── form.php      # Form tambah inventori
│   │   └── list.php      # Daftar inventori
│   ├── layouts/
│   │   ├── footer.php    # Template footer
│   │   └── header.php    # Template header
│   ├── membership/
│   │   ├── edit.php      # Form edit member
│   │   ├── form.php      # Form tambah member
│   │   └── list.php      # Daftar member
│   └── dashboard.php     # Halaman dashboard
│  
├── index.php         # Halaman utama
└── README.md             # Dokumentasi proyek
```

## Penjelasan Komponen

### 1. Assets
- **CSS**: Berisi file-file stylesheet untuk styling aplikasi
- **Images**: Menyimpan gambar yang digunakan dalam aplikasi
- **JavaScript**: Berisi file untuk client-side programming

### 2. Config
- **Database.php**: Konfigurasi koneksi database
- **functions.php**: Kumpulan fungsi helper
- **session.php**: Manajemen session pengguna

### 3. Controllers
- **auth**: Controller untuk autentikasi
- **inventory**: Controller untuk manajemen inventori
- **membership**: Controller untuk manajemen keanggotaan

### 4. Models
- **part.php**: Model untuk menangani logika bisnis

### 5. Views
- **inventory**: Tampilan untuk modul inventori
- **layouts**: Template header dan footer
- **membership**: Tampilan untuk modul keanggotaan
- **dashboard.php**: Halaman dashboard utama
- **index.php**: Halaman landing/login

### 6. SQL
- **database.sql**: File SQL untuk struktur dan data awal database

## Fitur Utama
1. **Sistem Autentikasi**
   - Login user
   - Logout
   - Manajemen session

2. **Manajemen Inventori**
   - Daftar inventori
   - Tambah inventori
   - Edit inventori
   - Hapus inventori

3. **Manajemen Keanggotaan**
   - Daftar anggota
   - Tambah anggota
   - Edit anggota
   - Hapus anggota

## Teknologi yang Digunakan
- PHP
- MySQL
- JavaScript
- CSS
- HTML

## Instalasi
1. Clone repository ini.
2. Import `sql/database.sql` ke MySQL.
3. Konfigurasi koneksi database di `config/Database.php`.
4. Jalankan aplikasi menggunakan web server (Apache/Nginx).

## Penggunaan
1. Akses halaman utama melalui browser.
2. Login menggunakan kredensial yang valid.
3. Akses fitur inventori atau keanggotaan melalui menu.
4. Logout setelah selesai menggunakan sistem.

## Hosting Aplikasi Web
### Langkah-langkah Hosting Aplikasi
1. **Persiapan Aplikasi**:
   - Pastikan semua file aplikasi telah diuji secara lokal dan berjalan dengan baik.
   - Ekspor database dari `phpMyAdmin` atau alat serupa.
2. **Pilih Penyedia Hosting**:
   - Saya menggunakan layanan hosting dari **Rumahweb**.
3. **Upload File Aplikasi**:
   - Gunakan **cPanel** atau **FileZilla** untuk mengunggah file aplikasi ke direktori public_html.
4. **Konfigurasi Database**:
   - Buat database baru di cPanel.
   - Import file SQL (`database.sql`) ke database yang baru dibuat.
   - Perbarui konfigurasi database di `config/Database.php` dengan kredensial hosting.
5. **Tes Aplikasi**:
   - Akses aplikasi melalui URL hosting dan lakukan pengujian fungsionalitas.

### Penyedia Hosting yang Dipilih
- Saya menggunakan layanan hosting dari **Rumahweb.net**.
- Subdomain yang saya gunakan adalah: [https://chandra-093.koling-dev.my.id](https://chandra-093.koling-dev.my.id).

### Keamanan Aplikasi
1. **Validasi Input**:
   - Semua input dari pengguna divalidasi untuk mencegah SQL Injection dan XSS.
2. **HTTPS**:
   - Menggunakan SSL/TLS untuk mengenkripsi komunikasi antara server dan pengguna.
3. **Manajemen Session**:
   - Menggunakan session PHP dengan konfigurasi `session.cookie_httponly` dan `session.cookie_secure` untuk mencegah serangan session hijacking.
4. **Proteksi File Upload**:
   - Memastikan hanya jenis file tertentu yang dapat diunggah.
5. **Backup Rutin**:
   - Melakukan backup file dan database secara berkala.

### Konfigurasi Server
1. **Server Hosting**:
   - Hosting di **Rumahweb** dengan teknologi LAMP (Linux, Apache, MySQL, PHP).
2. **Konfigurasi PHP**:
   - Mengaktifkan error logging dan menonaktifkan `display_errors` pada mode produksi.
   - Membatasi ukuran file upload dengan konfigurasi `upload_max_filesize`.
3. **Database**:
   - Menggunakan MySQL dengan user yang memiliki hak akses terbatas untuk meningkatkan keamanan.
4. **Caching**:
   - Menggunakan caching di sisi browser untuk meningkatkan performa aplikasi.
