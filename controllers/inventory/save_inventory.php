<?php
session_start(); // Memulai sesi PHP
include '../../config/Database.php'; // Menghubungkan file Database.php untuk koneksi ke database
error_reporting(E_ALL);
ini_set('display_errors', 1); // Mengaktifkan pelaporan error dan menampilkan semua error

$db = new Database(); // Membuat instance dari kelas Database
$conn = $db->getConnection(); // Mendapatkan koneksi ke database

// Memeriksa apakah metode request adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : null; // Mendapatkan ID jika ada
    $item_code = $_POST['item_code']; // Mendapatkan kode item dari form
    $item_name = $_POST['item_name']; // Mendapatkan nama item dari form
    $quantity = $_POST['quantity']; // Mendapatkan jumlah item dari form
    $category = $_POST['category']; // Mendapatkan kategori item dari form
    $description = $_POST['description']; // Mendapatkan deskripsi item dari form

    if ($id) {
        // Memperbarui item inventory yang sudah ada
        $stmt = $conn->prepare("UPDATE inventory SET item_code = ?, item_name = ?, quantity = ?, category = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssissi", $item_code, $item_name, $quantity, $category, $description, $id);
    } else {
        // Menambahkan item inventory baru
        $stmt = $conn->prepare("INSERT INTO inventory (item_code, item_name, quantity, category, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $item_code, $item_name, $quantity, $category, $description);
    }

    // Eksekusi query dan periksa hasilnya
    if ($stmt->execute()) {
        $_SESSION['success'] = "Inventory item saved successfully."; // Menyimpan pesan sukses dalam sesi
        header("Location: ../../views/inventory/list.php"); // Redirect ke halaman daftar inventory jika berhasil
        exit;
    } else {
        $_SESSION['error'] = "Failed to save inventory item."; // Menyimpan pesan error dalam sesi
        echo "Error: " . $stmt->error; // Menampilkan error jika gagal
    }
}
?>
