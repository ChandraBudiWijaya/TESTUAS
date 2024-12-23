<?php
session_start();

// Memeriksa apakah pengguna sudah login
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Redirect ke halaman dashboard jika sudah login
    header("Location: ../../views/dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sparepart Management</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .swal2-container {
            display: absolute;
            z-index: 9999; /* Menyesuaikan z-index agar tampil di atas konten lainnya */
        }
    </style>
</head>
<body>
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
            </div>
        </nav>
    </header>
    <div class="login-container">
        <div class="login-form">
            <h1>Welcome Back!</h1>
            <p>Login untuk mengakses akun Anda</p>
            <!-- Form login -->
            <form id="loginForm" method="POST" action="../controllers/auth/process_login.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
    </div>

    <script>
        // Fungsi untuk toggle menu navigasi
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }
        // Menambahkan event listener untuk form login
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dari submit default
            var form = this;

            // Mengirim data form menggunakan fetch API
            fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
            .then(response => response.json()) // Mengubah response menjadi JSON
            .then(data => {
                if (data.success) {
                    // Menampilkan pesan sukses menggunakan SweetAlert2
                    Swal.fire({
                        title: 'Login berhasil',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        // Mengarahkan ke halaman dashboard setelah login berhasil
                        window.location.href = '../../views/dashboard.php';
                    });
                } else {
                    // Menampilkan pesan error menggunakan SweetAlert2
                    Swal.fire({
                        title: data.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => console.error('Error:', error)); // Menangani error
        });
    </script>
</body>
</html>
