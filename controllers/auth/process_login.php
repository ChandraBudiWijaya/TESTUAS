<?php
session_start(); // Memulai sesi PHP
include '../../config/Database.php'; // Menghubungkan file Database.php untuk koneksi ke database

header('Content-Type: application/json'); // Mengatur header konten menjadi JSON

// Memeriksa apakah metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Mendapatkan username dari form
    $password = $_POST['password']; // Mendapatkan password dari form

    // Query untuk mendapatkan data pengguna berdasarkan username
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query); // Mempersiapkan query
    $stmt->bind_param("s", $username); // Mengikat parameter username ke query
    $stmt->execute(); // Eksekusi query
    $result = $stmt->get_result(); // Mendapatkan hasil query

    // Memeriksa apakah username ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Mengambil data pengguna

        // Periksa apakah password cocok
        if ($password === $user['password']) {
            $_SESSION['logged_in'] = true; // Menandai pengguna sebagai sudah login
            $_SESSION['username'] = $user['username']; // Menyimpan username dalam sesi

            // Mengembalikan respons sukses
            echo json_encode(['success' => true]);
        } else {
            $_SESSION['error'] = "Invalid password."; // Menyimpan pesan error dalam sesi
            echo json_encode(['success' => false, 'message' => 'Invalid password.']); // Mengembalikan respons error
        }
    } else {
        $_SESSION['error'] = "Username not found."; // Menyimpan pesan error dalam sesi
        echo json_encode(['success' => false, 'message' => 'Username not found.']); // Mengembalikan respons error
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']); // Mengembalikan respons error jika metode request tidak valid
}
?>
