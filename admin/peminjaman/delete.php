<?php
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
mysqli_query($conn, "DELETE FROM peminjaman WHERE id = '$id'");
echo "<script>alert('data deleted successfully');location.href='index.php'</script>";
