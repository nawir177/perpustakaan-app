<?php
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
$sql = "UPDATE anggota SET verifikasi=1 WHERE id ='$id'";
mysqli_query($conn, $sql);
echo "<script>alert('anggota berhasil di verifikasi');location.href='index.php'</script>";
