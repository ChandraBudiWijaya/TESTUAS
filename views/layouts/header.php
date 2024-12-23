<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management System</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="../assets/bg1.jpg" alt="Anugerah Motor Logo">
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
    <!-- Script untuk toggle menu navigasi -->
    <script>
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }
    </script>
    <!-- Main content -->
    <main>
