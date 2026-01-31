<?php
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from barang where id_barang='$id'");

echo "<script>alert('Data Barang akan di hapus?'); window.location.href='barang.php'</script>";
?>