<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Part</title>
    <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>
<a href="../../views/inventory/list.php" class="btn-back">&lt; Back</a>
    <div class="form-container">
        <div class="form-header">
            <h2>Add/Edit Part</h2>
        </div>
        <form method="POST" action="../../controllers/inventory/save_inventory.php">
            <input type="hidden" name="id" value="<?= isset($part) ? $part['id'] : ''; ?>">
            <label>Item Code:</label>
            <input type="text" name="item_code" value="<?= isset($part) ? htmlspecialchars($part['item_code']) : ''; ?>" required>
            <label>Item Name:</label>
            <input type="text" name="item_name" value="<?= isset($part) ? htmlspecialchars($part['item_name']) : ''; ?>" required>
            <label>Quantity:</label>
            <input type="number" name="quantity" value="<?= isset($part) ? htmlspecialchars($part['quantity']) : ''; ?>" required>
            <label>Category:</label>
            <input type="text" name="category" value="<?= isset($part) ? htmlspecialchars($part['category']) : ''; ?>" required>
            <label>Description:</label>
            <textarea name="description"><?= isset($part) ? htmlspecialchars($part['description']) : ''; ?></textarea>
            <div class="form-buttons">
                <a href="../../views/inventory/list.php" class="btn-cancel">Cancel</a>
                <button type="submit"><?= isset($part) ? 'Update' : 'Save'; ?></button>
            </div>
        </form>
    </div>
</body>
</html>
