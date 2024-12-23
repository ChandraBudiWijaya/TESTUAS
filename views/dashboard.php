<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect ke halaman login jika belum login
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anugerah Motor Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <header>
        <div class="logo">
            <img src="../assets/img/bg1.jpg" alt="Anugerah Motor Logo">
            <span>Anugerah Motor</span>
        </div>
        <nav>
            <div class="hamburger" onclick="toggleMenu()">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <div class="nav-links" id="navLinks">
                <a target="_blank" href="https://www.instagram.com/ceo_wijaya31/">Contact us</a>
                <a href="../controllers/auth/logout.php" class="logout">Logout</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>The Inventory Solution For Your Business</h1>
        <p>Manage and organize your sparepart inventory easily and efficiently.</p>
        <div class="hero-buttons">
            <a href="membership/list.php" class="btn-primary">Manage Membership</a>
            <a href="inventory/list.php" class="btn-primary">Manage Inventory</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Help</a>
        </div>
        <p>&copy; 2024 Anugerah Motor</p>
    </footer>

    <!-- JavaScript -->
    <script>
        // Fungsi untuk toggle menu navigasi
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }
    </script>
</body>
</html>
