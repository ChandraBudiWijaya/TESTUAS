<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Menghubungkan file Database.php untuk koneksi ke database
include '../../config/Database.php';

// Membuat instance dari kelas Database dan mendapatkan koneksi
$db = new Database();
$conn = $db->getConnection();

// Mengambil semua data dari tabel members
$memberships = $conn->query("SELECT * FROM members")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership List</title>
    <link rel="stylesheet" href="../../assets/css/membership.css">
</head>
<body>
    <!-- Tombol untuk kembali ke dashboard -->
    <a href="../../views/dashboard.php" class="btn-back">&lt; Back to Dashboard</a>
    <div class="membership-container">
        <div class="membership-header">
            <h2>Membership List</h2>
            <!-- Tombol untuk menambah membership baru -->
            <a href="../../views/membership/form.php" class="add-btn">Add New Membership</a>
        </div>
        <!-- Pembungkus untuk tabel -->
        <div class="table-wrapper">
            <table class="membership-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Membership Code</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Membership Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Looping melalui setiap membership dan menampilkan data dalam tabel -->
                    <?php foreach ($memberships as $membership): ?>
                        <tr>
                            <td><?= $membership['id']; ?></td>
                            <td><?= htmlspecialchars($membership['membership_code']); ?></td>
                            <td><?= htmlspecialchars($membership['name']); ?></td>
                            <td><?= htmlspecialchars($membership['email']); ?></td>
                            <td><?= htmlspecialchars($membership['phone']); ?></td>
                            <td><?= htmlspecialchars($membership['membership_type']); ?></td>
                            <td class="action-buttons">
                                <!-- Tombol untuk mengedit membership -->
                                <a href="../../views/membership/edit.php?id=<?= $membership['id']; ?>" class="btn-edit">Edit</a>
                                <!-- Tombol untuk menghapus membership dengan konfirmasi -->
                                <a href="../../controllers/membership/delete_membership.php?id=<?= $membership['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
