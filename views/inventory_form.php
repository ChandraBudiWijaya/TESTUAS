<form method="POST" action="../save_inventory.php">
    <h2>Add/Edit Part</h2>
    <input type="hidden" name="id" value="<?= isset($part) ? $part['id'] : ''; ?>">
    <label>Part Name:</label>
    <input type="text" name="part_name" value="<?= isset($part) ? htmlspecialchars($part['part_name']) : ''; ?>" required>
    <label>Stock:</label>
    <input type="number" name="stock" value="<?= isset($part) ? htmlspecialchars($part['stock']) : ''; ?>" required>
    <label>Description:</label>
    <textarea name="description"><?= isset($part) ? htmlspecialchars($part['description']) : ''; ?></textarea>
    <button type="submit"><?= isset($part) ? 'Update' : 'Save'; ?></button>
</form>
