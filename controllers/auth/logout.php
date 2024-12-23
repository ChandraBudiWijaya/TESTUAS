<?php
session_start(); // Memulai sesi PHP

// Hapus semua sesi
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

// Redirect ke halaman login
header("Location: ../../index.php"); // Mengarahkan pengguna ke halaman login
exit(); // Menghentikan eksekusi skrip
?>
