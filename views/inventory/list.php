<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Menghubungkan file Database.php untuk koneksi ke database
include '../../config/Database.php';

// Membuat instance dari kelas Database dan mendapatkan koneksi
$db = new Database();
$conn = $db->getConnection();

// Mengambil semua data dari tabel inventory
$items = $conn->query("SELECT * FROM inventory")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory List</title>
    <link rel="stylesheet" href="../../assets/css/inventory.css">
</head>
<body>
    <!-- Tombol untuk kembali ke dashboard -->
    <a href="../../views/dashboard.php" class="btn-back">&lt; Back to Dashboard</a>
    <div class="inventory-container">
        <div class="inventory-header">
            <h2>Inventory List</h2>
            <!-- Tombol untuk menambah item baru -->
            <a href="../../views/inventory/form.php" class="add-btn">Add New Item</a>
        </div>
        <!-- Pembungkus untuk tabel -->
        <div class="table-wrapper">
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Looping melalui setiap item dan menampilkan data dalam tabel -->
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?= $item['id']; ?></td>
                            <td><?= htmlspecialchars($item['item_code']); ?></td>
                            <td><?= htmlspecialchars($item['item_name']); ?></td>
                            <td><?= htmlspecialchars($item['quantity']); ?></td>
                            <td><?= htmlspecialchars($item['category']); ?></td>
                            <td><?= htmlspecialchars($item['description']); ?></td>
                            <td class="action-buttons">
                                <!-- Tombol untuk mengedit item -->
                                <a href="../../views/inventory/edit.php?id=<?= $item['id']; ?>" class="btn-edit">Edit</a>
                                <!-- Tombol untuk menghapus item dengan konfirmasi -->
                                <a href="../../controllers/inventory/delete_item.php?id=<?= $item['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
