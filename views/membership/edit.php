<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Menghubungkan file Database.php untuk koneksi ke database
include '../../config/Database.php';

// Membuat instance dari kelas Database dan mendapatkan koneksi
$db = new Database();
$conn = $db->getConnection();

// Memeriksa apakah parameter 'id' ada dalam URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Mengambil data membership berdasarkan id
    $membership = $conn->query("SELECT * FROM members WHERE id = $id")->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Membership</title>
    <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2><?= isset($membership) ? 'Edit Members' : 'Add New Members'; ?></h2>
        </div>
        <!-- Form untuk mengedit atau menambah membership -->
        <form method="POST" action="../../controllers/membership/save_membership.php">
            <!-- Input tersembunyi untuk menyimpan ID membership -->
            <input type="hidden" name="id" value="<?= isset($membership) ? $membership['id'] : ''; ?>">
            <label>Name:</label>
            <!-- Input untuk nama membership -->
            <input type="text" name="name" value="<?= isset($membership) ? htmlspecialchars($membership['name']) : ''; ?>" required>
            <label>Email:</label>
            <!-- Input untuk email membership -->
            <input type="email" name="email" value="<?= isset($membership) ? htmlspecialchars($membership['email']) : ''; ?>" required>
            <label>Phone:</label>
            <!-- Input untuk nomor telepon membership -->
            <input type="text" name="phone" value="<?= isset($membership) ? htmlspecialchars($membership['phone']) : ''; ?>">
            <label>Membership Type:</label>
            <!-- Dropdown untuk memilih jenis membership -->
            <select name="membership_type">
                <option value="bronze" <?= isset($membership) && $membership['membership_type'] == 'bronze' ? 'selected' : ''; ?>>Bronze</option>
                <option value="silver" <?= isset($membership) && $membership['membership_type'] == 'silver' ? 'selected' : ''; ?>>Silver</option>
                <option value="gold" <?= isset($membership) && $membership['membership_type'] == 'gold' ? 'selected' : ''; ?>>Gold</option>
            </select>
            <label>Membership Code:</label>
            <!-- Input untuk kode membership yang tidak dapat diubah -->
            <input type="text" name="membership_code" value="<?= isset($membership) ? htmlspecialchars($membership['membership_code']) : ''; ?>" disabled>
            <div class="form-buttons">
                <!-- Tombol untuk membatalkan dan kembali ke daftar membership -->
                <a href="../../views/membership/list.php" class="btn-cancel">Cancel</a>
                <!-- Tombol untuk menyimpan atau memperbarui membership -->
                <button type="submit"><?= isset($membership) ? 'Update' : 'Save'; ?></button>
            </div>
        </form>
    </div>
</body>
</html>
