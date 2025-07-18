<?php
session_start();
if (isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}
require 'function.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $_SESSION['login'] = true;

        if (isset($_POST['remember'])) {
            $row = mysqli_fetch_assoc($result); // penting!
            setcookie('id', $row['id'], time() + 60);
            setcookie('key', hash('sha256', $row['username']), time() + 60);
        }

        header('location:index.php');
        exit;
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
     <style>
          body {
               background: linear-gradient(to right, #ffecd2, #fcb69f);
               font-family: 'Righteous', cursive;
          }

          .login {
               background: rgba(255, 255, 255, 0.9);
               border-radius: 15px;
               padding: 40px;
               box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
               margin: auto;
               max-width: 450px;
          }

          .form-control {
               border-radius: 10px;
          }

          .btn-primary,
          .btn-danger,
          .btn-outline-primary {
               border-radius: 50px;
               font-weight: bold;
          }

          .btn-outline-primary {
               color: #ff6600;
               border-color: #ff6600;
          }

          .btn-outline-primary:hover {
               background-color: #ff6600;
               color: white;
          }

          .btn-primary {
               background-color: #ff6600;
               border: none;
          }

          .btn-primary:hover {
               background-color: #e65c00;
          }

          .btn-danger {
               background-color: #ff4d4d;
               border: none;
          }

          .btn-danger:hover {
               background-color: #cc0000;
          }

          .form-control::placeholder {
               font-style: italic;
               color: #999;
          }

          h4 {
               color: #333;
               margin-bottom: 30px;
          }
     </style>
     <title>Form Login</title>
</head>

<body>
     <div class="container">
          <div class="row my-5">
               <div class="col-md-6 offset-md-3 text-center login">
                    <h4 class="fw-bold">Login</h4>
                    <?php if (isset($error)) : ?>
                         <div class="alert alert-danger py-2">Username atau Password salah!</div>
                    <?php endif; ?>
                    <form action="" method="post">
                         <div class="form-group mb-4">
                              <input type="text" class="form-control" placeholder="Masukkan Username" name="username"
                                   autocomplete="off" required>
                         </div>
                         <div class="form-group mb-4">
                              <input type="password" class="form-control" placeholder="Masukkan Password" name="password"
                                   autocomplete="off" required>
                         </div>
                         <div class="form-group mb-4">
                              <div class="form-check d-flex justify-content-center">
                                   <input class="form-check-input me-2" type="checkbox" name="remember" id="remember">
                                   <label class="form-check-label" for="remember">
                                        Remember Me
                                   </label>
                              </div>
                         </div>
                         <button class="btn btn-primary text-uppercase px-4" type="submit" name="login">Login</button>
                         <a href="registrasi.php" class="btn btn-danger text-uppercase px-4 ms-2">
                              <i class="bi bi-pencil-square"></i> Sign Up
                         </a>
                    </form>
               </div>
          </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
