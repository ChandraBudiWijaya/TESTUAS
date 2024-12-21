<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $membership = $conn->query("SELECT * FROM memberships WHERE id = $id")->fetch_assoc();
}
?>
<form method="POST" action="../save_membership.php">
    <h2><?= isset($membership) ? 'Edit Membership' : 'Add New Membership'; ?></h2>
    <input type="hidden" name="id" value="<?= isset($membership) ? $membership['id'] : ''; ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?= isset($membership) ? htmlspecialchars($membership['name']) : ''; ?>" required>
    <label>Email:</label>
    <input type="email" name="email" value="<?= isset($membership) ? htmlspecialchars($membership['email']) : ''; ?>" required>
    <label>Phone:</label>
    <input type="text" name="phone" value="<?= isset($membership) ? htmlspecialchars($membership['phone']) : ''; ?>">
    <label>Membership Type:</label>
    <select name="membership_type">
        <option value="bronze" <?= isset($membership) && $membership['membership_type'] == 'bronze' ? 'selected' : ''; ?>>Bronze</option>
        <option value="silver" <?= isset($membership) && $membership['membership_type'] == 'silver' ? 'selected' : ''; ?>>Silver</option>
        <option value="gold" <?= isset($membership) && $membership['membership_type'] == 'gold' ? 'selected' : ''; ?>>Gold</option>
    </select>
    <button type="submit"><?= isset($membership) ? 'Update' : 'Save'; ?></button>
</form>
