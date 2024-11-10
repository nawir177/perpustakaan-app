<?php

$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');

function filter($data){
   global $conn;
   $data = mysqli_real_escape_string($conn, $data);
   return $data;
}
