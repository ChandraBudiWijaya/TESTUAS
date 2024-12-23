<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Membership</title>
    <link rel="stylesheet" href="../../assets/css/form.css">
    <script src="../../assets/js/script.js"></script>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2><?= isset($membership) ? 'Edit Members' : 'Add New Members'; ?></h2>
        </div>
        <!-- Form untuk mengedit atau menambah membership -->
        <form name="membershipForm" method="POST" action="../../controllers/membership/save_membership.php" onsubmit="return validateMemberForm()">
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
            <div class="form-buttons">
                <!-- Tombol untuk membatalkan dan kembali ke daftar membership -->
                <a href="list.php" class="btn-cancel">Cancel</a>
                <!-- Tombol untuk menyimpan atau memperbarui membership -->
                <button type="submit"><?= isset($membership) ? 'Update' : 'Save'; ?></button>
            </div>
        </form>
    </div>
</body>
</html>
