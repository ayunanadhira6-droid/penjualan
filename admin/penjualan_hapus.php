<?php
include '../koneksi.php';

$id = $_GET['id']; // id_jual

// 1. ambil detail penjualan
$data = mysqli_query($koneksi, "
    SELECT id_barang, jumlah 
    FROM penjualan_detail 
    WHERE id_jual = '$id'
");

// 2. kembalikan stok barang
while($d = mysqli_fetch_array($data)){
    mysqli_query($koneksi, "
        UPDATE barang 
        SET stok = stok + $d[jumlah]
        WHERE id_barang = '$d[id_barang]'
    ");
}

// 3. hapus detail penjualan
mysqli_query($koneksi, "
    DELETE FROM penjualan_detail 
    WHERE id_jual = '$id'
");

// 4. hapus penjualan
mysqli_query($koneksi, "
    DELETE FROM penjualan 
    WHERE id_jual = '$id'
");

echo "<script>
    alert('Data penjualan berhasil dihapus');
    window.location.href='penjualan.php';
</script>";
?>
