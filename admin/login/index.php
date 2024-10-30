<?php
include 'fungsi.php';
if (isset($_SESSION['LOGIN']) && $_SESSION['LOGIN'] === true) {
   header('Location: ../dashboard');
   exit; // Penting untuk memastikan tidak ada kode tambahan yang dieksekusi setelah header
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Page</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <style>
      /* Layout untuk layar penuh */
      html,
      body {
         height: 100%;
         margin: 0;
         font-family: Arial, sans-serif;
         overflow: hidden;
      }

      .container-fluid {
         height: 100vh;
         display: flex;
      }

      /* Bagian kiri dengan gambar latar belakang */
      .left-side {
         flex: 1;
         background: url('https://source.unsplash.com/1600x900/?library,books') no-repeat center center;
         background-size: cover;
         position: relative;
         display: flex;
         align-items: center;
         justify-content: center;
         color: #fff;
         text-align: center;
      }

      .left-side::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0, 0, 0, 0.5);
         /* Overlay hitam transparan untuk kontras teks */
      }

      .left-side .overlay-content {
         position: relative;
         z-index: 1;
      }

      .left-side .overlay-content h1 {
         font-size: 4rem;
         margin-bottom: 20px;
         font-family: 'Roboto', sans-serif;
      }

      .left-side .overlay-content p {
         font-size: 1.5rem;
      }

      /* Bagian kanan dengan formulir login */
      .right-side {
         flex: 1;
         display: flex;
         flex-direction: column;
         justify-content: center;
         background: #f8f9fa;
         padding: 20px;
      }

      .login-container {
         background: #ffffff;
         padding: 40px;
         border-radius: 12px;
         box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
         width: 100%;
         max-width: 500px;
         margin: 0 auto;
         transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .login-container:hover {
         transform: translateY(-10px);
         box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
      }

      .login-container h2 {
         margin-bottom: 20px;
         font-family: 'Roboto', sans-serif;
         color: #333;
      }

      .form-control {
         border-radius: 8px;
         border: 1px solid #ced4da;
         transition: border-color 0.3s ease;
      }

      .form-control:focus {
         border-color: #28a745;
         box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
      }

      .btn-login {
         width: 100%;
         padding: 12px;
         background-color: #28a745;
         /* Hijau tombol */
         color: #ffffff;
         border: none;
         border-radius: 8px;
         cursor: pointer;
         transition: background-color 0.3s ease, transform 0.3s ease;
      }

      .btn-home {
         width: 100%;
         padding: 12px;
         background-color: #34ebba;
         /* Hijau tombol */
         color: #ffffff;
         border: none;
         border-radius: 8px;
         cursor: pointer;
         transition: background-color 0.3s ease, transform 0.3s ease;
      }

      .btn-login:hover {
         background-color: #218838;
         /* Warna hijau lebih gelap pada hover */
         transform: scale(1.05);
      }

      .btn-home:hover {
         background-color: #34ebba;
         /* Warna hijau lebih gelap pada hover */
         transform: scale(1.05);
      }

      .form-group {
         margin-bottom: 20px;
      }

      .form-group label {
         font-weight: bold;
         color: #333;
      }

      .login-header {
         text-align: center;
         margin-bottom: 40px;
      }

      .login-header img {
         max-width: 150px;
         margin-bottom: 20px;
      }

      @media (max-width: 768px) {
         .left-side {
            display: none;
         }

         .right-side {
            flex: 1;
            height: 100vh;
            overflow-y: auto;
         }
      }
   </style>
</head>

<body>
   <div class="container-fluid">
      <!-- Bagian kiri dengan gambar latar belakang -->
      <div class="left-side">
         <div class="overlay-content">
            <img src="../../image/login.jpg" alt="" width="800" height="800">
         </div>
      </div>

      <!-- Bagian kanan dengan formulir login -->
      <div class="right-side d-flex align-items-center justify-content-center">
         <div class="login-container">
            <div class="login-header">
               <img src="../assets/image/logo.png" alt="Library Logo">
               <h2>Login</h2>
            </div>
            <form action="" method="post">
               <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
               </div>
               <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
               </div>
               <button type="submit" name="login" class="btn-login">Login</button>
            </form>
            <a href="../../home">
               <button type="button" class="btn-home my-2">back to home</button>
            </a>

            <a href="../../register/">
               <p style="text-align: center;">Register</p>
            </a>
         </div>
      </div>
   </div>
   <?php
   if (isset($_POST['login'])) {
      if (login($_POST)['status'] == true && login($_POST)['admin']==true  ) {
         echo "<script> alert('Login Success..'); </script>";
         echo "<script>window.location.href ='../dashboard';</script>";
         exit; // Pastikan untuk menghentikan eksekusi setelah pengalihan
      }elseif
      (login($_POST)['status'] == true && login($_POST)['admin'] == false){
         echo "<script> alert('Login Success..'); </script>";
         echo "<script>window.location.href ='../../home';</script>";
      } else {
         echo "<script> alert('Username atau Password Salah..!'); </script>";
      }
   }
   ?>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>