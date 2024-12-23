<?php
session_start(); // Memulai sesi PHP

// Memeriksa apakah variabel sesi 'user_id' ada
if (!isset($_SESSION['user_id'])) {
    // Jika tidak ada, arahkan pengguna ke halaman login
    header("Location: ../../index.php");
    exit; // Menghentikan eksekusi skrip
}
?>
