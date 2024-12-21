<?php
$memberships = $conn->query("SELECT * FROM memberships")->fetch_all(MYSQLI_ASSOC);
?>
<h2>Membership List</h2>
<a href="views/memberships_form.php">Add New Membership</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Membership Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($memberships as $membership): ?>
            <tr>
                <td><?= $membership['id']; ?></td>
                <td><?= htmlspecialchars($membership['name']); ?></td>
                <td><?= htmlspecialchars($membership['email']); ?></td>
                <td><?= htmlspecialchars($membership['phone']); ?></td>
                <td><?= htmlspecialchars($membership['membership_type']); ?></td>
                <td>
                    <a href="views/memberships_form.php?id=<?= $membership['id']; ?>">Edit</a> |
                    <a href="delete_membership.php?id=<?= $membership['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
