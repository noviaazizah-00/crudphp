<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}
require 'function.php';

$nis = $_GET['nis'];
$siswa = query("SELECT * FROM siswa WHERE nis = $nis")[0];

if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data siswa berhasil diubah!');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data siswa gagal diubah!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body background="img/bg/gambar1.jpeg">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
    <div class="container">
        <a class="navbar-brand" href="index.php">INOVASITECH</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#Dibuat oleh : ">Dibuat oleh :</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row my-2 text-light">
        <div class="col-md"><h3 class="fw-bold text-uppercase ubah_data"></h3></div>
        <hr>
    </div>
    <div class="row my-2 text-light">
        <div class="col-md">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="<?= $siswa['gambar']; ?>">
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="number" class="form-control w-50" id="nis" value="<?= $siswa['nis']; ?>" name="nis" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control w-50" id="nama" value="<?= $siswa['nama']; ?>" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="tmpt_Lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control w-50" id="tmpt_Lahir" value="<?= $siswa['tmpt_Lahir']; ?>" name="tmpt_Lahir" required>
                </div>
                <div class="mb-3">
                    <label for="tgl_Lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control w-50" id="tgl_Lahir" value="<?= $siswa['tgl_Lahir']; ?>" name="tgl_Lahir" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" value="L" <?= ($siswa['jekel'] == 'L') ? "checked" : ""; ?>>
                        <label class="form-check-label">Laki - Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" value="P" <?= ($siswa['jekel'] == 'P') ? "checked" : ""; ?>>
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="merk_kategori" class="form-label">Merk HP</label>
                    <select class="form-select w-50" id="merk_kategori" name="merk_kategori" required>
                        <option disabled selected value>-- Pilih Merk --</option>
                        <option value="Iphone" <?= ($siswa['merk_kategori'] == 'Iphone') ? 'selected' : ''; ?>>Iphone</option>
                        <option value="Samsung" <?= ($siswa['merk_kategori'] == 'Samsung') ? 'selected' : ''; ?>>Samsung</option>
                        <option value="Xiaomi" <?= ($siswa['merk_kategori'] == 'Xiaomi') ? 'selected' : ''; ?>>Xiaomi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" class="form-control w-50" id="email" value="<?= $siswa['email']; ?>" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Saat Ini</label><br>
                    <img src="img/<?= $siswa['gambar']; ?>" width="50%" style="margin-bottom: 10px;">
                    <input class="form-control form-control-sm w-50" id="gambar" name="gambar" type="file">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control w-50" id="alamat" rows="5" name="alamat"><?= $siswa['alamat']; ?></textarea>
                </div>
                <hr>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row bg-dark text-white text-center">
        <div class="col my-2" id="Dibuat oleh : ">
            <br><br><br>
            <h4 class="fw-bold text-uppercase">Dibuat oleh :</h4>
            <p>Ebit Christian Hamonangan Purba (1203012213076)</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/TextPlugin.min.js"></script>
<script>
    gsap.registerPlugin(TextPlugin);
    gsap.to('.ubah_data', {
        duration: 2,
        delay: 1,
        text: '<i class="bi bi-pencil-square"></i>Ubah Data Pembelian'
    })
    gsap.from('.navbar', {
        duration: 1,
        y: '-100%',
        opacity: 0,
        ease: 'bounce',
    })
</script>
</body>
</html>
