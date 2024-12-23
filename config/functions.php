<?php
// config/functions.php

// Fungsi untuk mendapatkan data inventory dari database
function getInventory($conn) {  // Koneksi database sebagai parameter
    $query = "SELECT * FROM inventory ORDER BY id DESC"; // Query untuk mengambil semua data dari tabel inventory
    $result = $conn->query($query); // Eksekusi query
    
    $inventory = []; // Array untuk menyimpan data inventory
    if ($result && $result->num_rows > 0) { // Memeriksa apakah hasil query tidak kosong
        while($row = $result->fetch_assoc()) { // Loop melalui setiap baris hasil query
            $inventory[] = $row; // Menambahkan baris ke array inventory
        }
    }
    
    return $inventory; // Mengembalikan array inventory
}

// Fungsi untuk menambahkan data inventory ke database
function addInventory($conn, $part_name, $stock, $description) {
    $stmt = $conn->prepare("INSERT INTO inventory (part_name, stock, description) VALUES (?, ?, ?)"); // Mempersiapkan query untuk menambahkan data
    $stmt->bind_param("sis", $part_name, $stock, $description); // Mengikat parameter ke query
    $stmt->execute(); // Eksekusi query
}

// Fungsi untuk memperbarui data inventory di database
function updateInventory($conn, $id, $part_name, $stock, $description) {
    $stmt = $conn->prepare("UPDATE inventory SET part_name = ?, stock = ?, description = ? WHERE id = ?"); // Mempersiapkan query untuk memperbarui data
    $stmt->bind_param("sisi", $part_name, $stock, $description, $id); // Mengikat parameter ke query
    $stmt->execute(); // Eksekusi query
}

// Fungsi untuk menghapus data inventory dari database
function deleteInventory($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM inventory WHERE id = ?"); // Mempersiapkan query untuk menghapus data
    $stmt->bind_param("i", $id); // Mengikat parameter id ke query
    $stmt->execute(); // Eksekusi query
}
?>
