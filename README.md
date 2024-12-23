# TESTUAS - Sistem Informasi Inventori dan Keanggotaan
### Identitas
- Nama: CHANDRA BUDI WIJAYA
- NIM: 122140093
- Mata Kuliah: PEMROGRAMAN WEB RA

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
│   ├── dashboard.php     # Halaman dashboard
│   └── index.php         # Halaman utama
│
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
1. Clone repository ini
2. Import `sql/database.sql` ke MySQL
3. Konfigurasi koneksi database di `config/Database.php`
4. Jalankan aplikasi menggunakan web server (Apache/Nginx)

## Penggunaan
1. Akses halaman utama melalui browser
2. Login menggunakan kredensial yang valid
3. Akses fitur inventori atau keanggotaan melalui menu
4. Logout setelah selesai menggunakan sistem