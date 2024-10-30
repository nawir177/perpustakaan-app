<?php
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
mysqli_query($conn, "DELETE FROM kondisi_buku WHERE id = '$id'");
echo "<script>alert('data deleted successfully');location.href='index.php'</script>";
