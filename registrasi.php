<?php
require 'function.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('User baru berhasil ditambahkan');
        </script>";
    } else {
        echo mysqli_error($koneksi);
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
     <!-- Font Google -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
     <!-- Icon Bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
     <!-- Style -->
     <style>
          body {
               background: linear-gradient(to right, #ffecd2, #fcb69f);
               font-family: 'Righteous', cursive;
          }

          .register {
               background: rgba(255, 255, 255, 0.95);
               border-radius: 15px;
               padding: 40px;
               box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
               margin: auto;
               max-width: 500px;
          }

          h4 {
               color: #333;
               margin-bottom: 30px;
          }

          .form-control {
               border-radius: 10px;
          }

          .form-label {
               font-weight: bold;
               color: #333;
          }

          .btn-primary,
          .btn-info {
               border-radius: 50px;
               font-weight: bold;
               padding: 8px 20px;
          }

          .btn-info {
               background-color: #00bcd4;
               border: none;
          }

          .btn-info:hover {
               background-color: #0097a7;
          }

          .btn-primary {
               background-color: #ff6600;
               border: none;
          }

          .btn-primary:hover {
               background-color: #e65c00;
          }

          .form-control::placeholder {
               font-style: italic;
               color: #999;
          }
     </style>

     <title>Form Register</title>
</head>

<body>
     <div class="container">
          <div class="row my-5">
               <div class="col-md-8 offset-md-2 text-center register">
                    <h4 class="fw-bold text-uppercase">Register</h4>
                    <form action="" method="post">
                         <div class="form-group mb-3">
                              <label for="username" class="form-label">Username:</label>
                              <input type="text" class="form-control" name="username" id="username"
                                   placeholder="Masukkan Username" autocomplete="off" required>
                         </div>
                         <div class="form-group mb-3">
                              <label for="password" class="form-label">Password:</label>
                              <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Masukkan Password" autocomplete="off" required>
                         </div>
                         <div class="form-group mb-4">
                              <label for="password2" class="form-label">Konfirmasi Password:</label>
                              <input type="password" class="form-control" name="password2" id="password2"
                                   placeholder="Ulangi Password" autocomplete="off" required>
                         </div>
                         <button class="btn btn-primary text-uppercase" type="submit" name="register">Register</button>
                         <a href="login.php" class="btn btn-info text-uppercase ms-2"><i
                                   class="bi bi-box-arrow-in-right"></i> Login</a>
                    </form>
               </div>
          </div>
     </div>

     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
