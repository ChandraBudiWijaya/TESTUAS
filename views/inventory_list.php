<?php
$inventory = getInventory($conn);
?>
<h2>Inventory List</h2>
<a href="views/inventory_form.php">Add New Part</a>
<table border="1">
    <thead>
        <tr>
            <th>Part Name</th>
            <th>Stock</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inventory as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['part_name']); ?></td>
                <td><?= htmlspecialchars($item['stock']); ?></td>
                <td><?= htmlspecialchars($item['description']); ?></td>
                <td>
                    <a href="inventory_form.php?id=<?= $item['id']; ?>">Edit</a> |
                    <a href="delete_inventory.php?id=<?= $item['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
