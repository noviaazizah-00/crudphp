<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

require 'function.php';

if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Pembelian Handphone berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Pembelian Handphone gagal ditambahkan!');
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
     <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

     <title>Tambah Data</title>

     <style>
          body {
               background: linear-gradient(to right, #a8edea, #fed6e3);
               font-family: 'Righteous', cursive;
          }

          .navbar, .footer {
               background-color: #ff9800 !important;
          }

          .navbar .nav-link, .navbar-brand {
               color: white !important;
               font-size: 14px;
               padding: 10px 15px;
          }

          .navbar .nav-link:hover {
               background-color: #ffc107;
               border-radius: 5px;
          }

          .form-label {
               font-weight: bold;
          }

          .container {
               background: rgba(237, 201, 201, 0.8);
               border-radius: 15px;
               padding: 20px;
               box-shadow: 0 0 15px rgba(0,0,0,0.2);
               margin-top: 20px;
          }
     </style>
</head>

<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container">
               <a class="navbar-brand" href="index.php">INOVASITECH</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item">
                              <a class="nav-link" href="index.php">Home</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="#about">About</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="logout.php">Logout</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
     <!-- Close Navbar -->

     <!-- Container -->
     <div class="container">
          <div class="row my-2">
               <div class="col-md text-dark">
                    <h3 class="fw-bold text-uppercase Tambah_data"></h3>
               </div>
               <hr>
          </div>
          <div class="row my-2 text-dark">
               <div class="col-md">
                    <form action="" method="post" enctype="multipart/form-data">
                         <div class="mb-3">
                              <label for="nis" class="form-label">NIM</label>
                              <input type="number" class="form-control w-50" id="nis" name="nis" required>
                         </div>
                         <div class="mb-3">
                              <label for="nama" class="form-label">Nama</label>
                              <input type="text" class="form-control w-50" id="nama" name="nama" required>
                         </div>
                         <div class="mb-3">
                              <label for="tmpt_Lahir" class="form-label">Tempat Lahir</label>
                              <input type="text" class="form-control w-50" id="tmpt_Lahir" name="tmpt_Lahir" required>
                         </div>
                         <div class="mb-3">
                              <label for="tgl_Lahir" class="form-label">Tanggal Lahir</label>
                              <input type="date" class="form-control w-50" id="tgl_Lahir" name="tgl_Lahir" required>
                         </div>
                         <div class="mb-3">
                              <label class="form-label">Jenis Kelamin</label>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="jekel" id="Laki" value="Laki - Laki">
                                   <label class="form-check-label" for="Laki">Laki - Laki</label>
                              </div>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="jekel" id="Perempuan" value="Perempuan">
                                   <label class="form-check-label" for="Perempuan">Perempuan</label>
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="Merk" class="form-label">Merk</label>
                              <select class="form-select w-50" id="Merk" name="Merk">
                                   <option disabled selected value>Pilih Merk</option>
                                   <option value="Iphone">Iphone</option>
                                   <option value="Samsung">Samsung</option>
                                   <option value="Xioami">Xioami</option>
                                   <option value="Oppo">Oppo</option>
                                   <option value="Redmi">Redmi</option>
                                   <option value="Infinix">Infinix</option>
                                   <option value="POCO">POCO</option>
                              </select>
                         </div>
                         <div class="mb-3">
                              <label for="email" class="form-label">E-Mail</label>
                              <input type="email" class="form-control w-50" id="email" name="email" required>
                         </div>
                         <div class="mb-3">
                              <label for="gambar" class="form-label">Gambar</label>
                              <input class="form-control w-50" id="gambar" name="gambar" type="file">
                         </div>
                         <div class="mb-3">
                              <label for="alamat" class="form-label">Alamat</label>
                              <textarea class="form-control w-50" id="alamat" name="alamat" rows="5" required></textarea>
                         </div>
                         <hr>
                         <a href="index.php" class="btn btn-secondary">Kembali</a>
                         <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>
               </div>
          </div>
     </div>
     <!-- Close Container -->

     <!-- Footer -->
     <div class="container-fluid footer">
          <div class="row text-white text-center">
               <div class="col my-2" id="about">
                    <p class="mb-0">Aplikasi ini dibuat untuk mengelola data penjualan handphone.<br> Dibuat oleh: <strong>Novia Nur Azizah</strong><br>231001019 | Universitas Teknologi Sumbawa</p>
               </div>
          </div>
     </div>
     <!-- Close Footer -->

     <!-- Script -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/TextPlugin.min.js"></script>
     <script>
          gsap.registerPlugin(TextPlugin);
          gsap.to('.Tambah_data', {
               duration: 2,
               delay: 1,
               text: '<i class="bi bi-person-plus-fill"></i> Tambah Data Pembelian :)'
          });
          gsap.from('.navbar', {
               duration: 1,
               y: '-100%',
               opacity: 0,
               ease: 'bounce'
          });
     </script>
</body>
</html>
