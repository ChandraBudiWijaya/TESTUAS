<?php
include('session.php');
include('config.php');
include('functions.php');

include('views/header.php');

// Tambahkan menu membership
?>
<nav>
    <a href="dashboard.php">Inventory</a> |
    <a href="views/memberships_list.php">Membership</a>
</nav>

<?php
include('views/footer.php');
?>
