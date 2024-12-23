<?php
class Database {
    private $host = 'localhost'; // Nama host database
    private $user = 'root'; // Nama pengguna database
    private $password = ''; // Kata sandi database
    private $database = 'anugerah_motor'; // Nama database
    private $conn; // Properti untuk menyimpan koneksi database

    // Konstruktor untuk menginisialisasi koneksi database
    public function __construct() {
        $this->connect();
    }

    // Metode privat untuk menghubungkan ke database
    private function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        // Memeriksa apakah koneksi berhasil
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error); // Menampilkan pesan error jika koneksi gagal
        }
    }

    // Metode untuk mendapatkan koneksi database
    public function getConnection(): mysqli {
        return $this->conn;
    }

    // Destruktor untuk menutup koneksi database
    public function __destruct() {
        $this->conn->close();
    }
}

// Penggunaan kelas Database
$db = new Database(); // Membuat instance dari kelas Database
$conn = $db->getConnection(); // Mendapatkan koneksi ke database
?>
