<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}
require 'function.php';
$siswa = query("SELECT * FROM siswa ORDER BY nis DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>

    <!-- Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">

    <!-- Custom Style -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #cbe8ff, #a5d8ff);
        }

        .navbar,
        footer {
            background-color: #87CEFA !important;
        }

        .navbar-brand,
        .nav-link,
        footer {
            color: #000 !important;
            font-weight: 400;
        }

        table thead {
            background-color: #87CEFA;
            color: #000;
        }

        table tbody tr {
            background-color: #f0f8ff;
        }

        .container {
            background-color: #ffffffcc;
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
        }

        .btn {
            font-weight: 600;
        }

        footer {
            padding: 30px 0;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">INOVASITECH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Container -->
    <div class="container">
        <h3 class="text-center fw-bold text-uppercase mb-4">DATA PENJUALAN HANDPHONE</h3>

        <div class="mb-3 d-flex justify-content-between">
            <div>
                <a href="addData.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Tambah Data</a>
                <a href="export.php" target="_blank" class="btn btn-success"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Ekspor ke Excel</a>
            </div>
        </div>

        <table id="data" class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>Merk Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($siswa as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['jekel']; ?></td>
                        <?php
                        $now = time();
                        $timeTahun = strtotime($row['tgl_Lahir']);
                        $setahun = 31536000;
                        $hitung = ($now - $timeTahun) / $setahun;
                        ?>
                        <td><?= floor($hitung); ?> Tahun</td>
                        <td><?= $row['merk_kategori']; ?></td>
                        <td>
                            <button class="btn btn-success btn-sm detail" data-id="<?= $row['nis']; ?>">
                                <i class="bi bi-info-circle-fill"></i> Detail
                            </button>
                            <a href="ubah.php?nis=<?= $row['nis']; ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Ubah
                            </a>
                            <a href="hapus.php?nis=<?= $row['nis']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['nama']; ?> ?');">
                                <i class="bi bi-trash-fill"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- End Container -->

    <!-- Modal Detail -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-uppercase">Detail Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="detail-siswa">
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Detail -->

    <!-- Footer -->
    <footer class="text-center text-dark" id="about">
        <h5 class="fw-bold text-uppercase">TENTANG APLIKASI</h5>
        <p>
            Aplikasi ini dibuat untuk mengelola data penjualan handphone. <br>
            Dibuat oleh: <strong>Novia Nur Azizah</strong> <br>
            <em>Universitas Teknologi Sumbawa</em>  <code></code>
        </p>
    </footer>
    <!-- End Footer -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#data').DataTable();

            $('.detail').click(function() {
                var dataSiswa = $(this).attr("data-id");
                $.ajax({
                    url: "detail.php",
                    method: "post",
                    data: { dataSiswa: dataSiswa },
                    success: function(data) {
                        $('#detail-siswa').html(data);
                        $('#detail').modal("show");
                    }
                });
            });
        });
    </script>
</body>

</html>
