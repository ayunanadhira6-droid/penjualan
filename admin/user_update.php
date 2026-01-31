<?php
include '../koneksi.php';

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password =md5($_POST['password']);
$user_nama = $_POST['user_nama'];
$user_status = $_POST['user_status'];

mysqli_query($koneksi,"update user set username='$username', password='$password', user_nama='$user_nama', user_status='$user_status' where user_id='$user_id'");

echo "<script>alert('Data Telah Diubah'); window.location.href='user.php'</script>";
?>