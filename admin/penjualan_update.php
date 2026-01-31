<?php
include '../koneksi.php';

$id_jual  = $_POST['id_jual'];
$tgl_jual = $_POST['tgl_jual'];

mysqli_query($koneksi,"
    UPDATE penjualan 
    SET tgl_jual='$tgl_jual'
    WHERE id_jual='$id_jual'
");

echo "<script>
        alert('Tanggal Penjualan Berhasil Diubah');
        window.location.href='penjualan.php';
      </script>";
?>
