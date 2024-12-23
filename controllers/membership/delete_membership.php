<?php
include '../../config/Database.php'; // Menghubungkan file Database.php untuk koneksi ke database
error_reporting(E_ALL);
ini_set('display_errors', 1); // Mengaktifkan pelaporan error dan menampilkan semua error

$db = new Database(); // Membuat instance dari kelas Database
$conn = $db->getConnection(); // Mendapatkan koneksi ke database

// Memeriksa apakah parameter 'id' ada dalam URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Mengonversi parameter 'id' menjadi integer
    $stmt = $conn->prepare("DELETE FROM members WHERE id = ?"); // Mempersiapkan query untuk menghapus data berdasarkan id
    $stmt->bind_param("i", $id); // Mengikat parameter id ke query

    // Eksekusi query dan periksa hasilnya
    if ($stmt->execute()) {
        header("Location: ../../views/membership/list.php"); // Redirect ke halaman daftar membership jika berhasil
        exit;
    } else {
        echo "Error: " . $stmt->error; // Menampilkan error jika gagal
    }
}
?>
