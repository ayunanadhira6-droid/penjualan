<?php
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from user where user_id='$id'");

echo "<script>alert('data akan di hapus?'); window.location.href='user.php'</script>";
?>