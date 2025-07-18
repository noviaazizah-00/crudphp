<?php
session_start();

// Cek jika user belum login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">INOVASITECH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Konten -->
    <div class="container mt-5">
        <h2>Tentang Aplikasi</h2>
        <p>Aplikasi ini dibuat untuk membantu proses manajemen data siswa dalam bentuk CRUD (Create, Read, Update, Delete) menggunakan PHP dan MySQL.</p>

        <h3>Fitur</h3>
        <ul>
            <li>Tambah data siswa</li>
            <li>Ubah data siswa</li>
            <li>Hapus data siswa</li>
            <li>Lihat detail data siswa</li>
        </ul>

        <h3>Pengembang</h3>
        <p>Nama: Novia Nur Azizah</p>
        <p>NIM:  231001019</p>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center mt-5 p-3">
        &copy; <?= date('Y'); ?> INOVASITECH - All rights reserved.
    </footer>
</body>
</html>
