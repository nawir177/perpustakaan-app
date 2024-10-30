<?php
session_start();
include_once '../controller.php';
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
function login($data)
{
   global $conn;
   $username = $data['username'];
   $password = $data['password'];

   $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
   $row = mysqli_fetch_assoc($result);

   if (mysqli_affected_rows($conn) > 0) {
      if (password_verify($password, $row['password'])) {
         $user = show('user', $row['id']);
         $_SESSION['LOGIN'] = true;
         $_SESSION['user'] = $row['id'];
         if ($user['is_admin'] == true) {
            $_SESSION['admin'] = true;
         }


         return ['status'=>true, 'admin'=>$user['is_admin']];
      }
   } else {
      return false;
   }
}
