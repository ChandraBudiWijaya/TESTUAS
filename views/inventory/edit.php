<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../config/Database.php';

$db = new Database();
$conn = $db->getConnection();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $part = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Part</title>
    <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Add/Edit Part</h2>
        </div>
        <!-- Form untuk menambah atau mengedit item inventory -->
        <form method="POST" action="../../controllers/inventory/save_inventory.php">
            <!-- Input tersembunyi untuk menyimpan ID item -->
            <input type="hidden" name="id" value="<?= isset($part) ? $part['id'] : ''; ?>">
            <label>Item Code:</label>
            <!-- Input untuk kode item dengan atribut readonly -->
            <input type="text" name="item_code" value="<?= isset($part) ? htmlspecialchars($part['item_code']) : ''; ?>" disabled>
            <label>Item Name:</label>
            <!-- Input untuk nama item -->
            <input type="text" name="item_name" value="<?= isset($part) ? htmlspecialchars($part['item_name']) : ''; ?>" required>
            <label>Quantity:</label>
            <!-- Input untuk jumlah item -->
            <input type="number" name="quantity" value="<?= isset($part) ? htmlspecialchars($part['quantity']) : ''; ?>" required>
            <label>Category:</label>
            <!-- Input untuk kategori item -->
            <input type="text" name="category" value="<?= isset($part) ? htmlspecialchars($part['category']) : ''; ?>" required>
            <label>Description:</label>
            <!-- Textarea untuk deskripsi item -->
            <textarea name="description"><?= isset($part) ? htmlspecialchars($part['description']) : ''; ?></textarea>
            <div class="form-buttons">
                <!-- Tombol untuk membatalkan dan kembali ke daftar inventory -->
                <a href="../../views/inventory/list.php" class="btn-cancel">Cancel</a>
                <!-- Tombol untuk menyimpan atau memperbarui item -->
                <button type="submit"><?= isset($part) ? 'Update' : 'Save'; ?></button>
            </div>
        </form>
    </div>
</body>
</html>
