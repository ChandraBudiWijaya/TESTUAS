<?php
include('../../config/Database.php'); // Menghubungkan file Database.php untuk koneksi ke database
error_reporting(E_ALL);
ini_set('display_errors', 1); // Mengaktifkan pelaporan error dan menampilkan semua error

$db = new Database(); // Membuat instance dari kelas Database
$conn = $db->getConnection(); // Mendapatkan koneksi ke database

// Fungsi untuk menghasilkan kode membership unik
function generateMembershipCode($conn) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Karakter yang digunakan untuk kode
    $charactersLength = strlen($characters); // Panjang karakter
    $codeLength = 10; // Panjang kode membership
    $isUnique = false; // Variabel untuk memeriksa keunikan kode

    while (!$isUnique) {
        $randomCode = '';
        for ($i = 0; $i < $codeLength; $i++) {
            $randomCode .= $characters[rand(0, $charactersLength - 1)]; // Menghasilkan kode acak
        }

        // Memeriksa apakah kode yang dihasilkan unik
        $stmt = $conn->prepare("SELECT COUNT(*) FROM members WHERE membership_code = ?");
        $stmt->bind_param("s", $randomCode);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();

        if ($count == 0) {
            $isUnique = true; // Jika kode unik, keluar dari loop
        }
    }

    return $randomCode; // Mengembalikan kode unik
}

// Memeriksa apakah metode request adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : null; // Mendapatkan ID jika ada
    $name = $_POST['name']; // Mendapatkan nama dari form
    $email = $_POST['email']; // Mendapatkan email dari form
    $phone = $_POST['phone']; // Mendapatkan nomor telepon dari form
    $membership_type = $_POST['membership_type']; // Mendapatkan jenis membership dari form

    if ($id) {
        // Memperbarui membership yang sudah ada
        $stmt = $conn->prepare("UPDATE members SET name = ?, email = ?, phone = ?, membership_type = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $email, $phone, $membership_type, $id);
    } else {
        // Menghasilkan kode membership unik
        $membership_code = generateMembershipCode($conn);

        // Menambahkan membership baru
        $stmt = $conn->prepare("INSERT INTO members (membership_code, name, email, phone, membership_type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $membership_code, $name, $email, $phone, $membership_type);
    }

    // Eksekusi query dan periksa hasilnya
    if ($stmt->execute()) {
        header("Location: ../../views/membership/list.php"); // Redirect ke halaman daftar membership jika berhasil
        exit;
    } else {
        echo "Error: " . $stmt->error; // Menampilkan error jika gagal
    }
}
?>
