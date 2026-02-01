<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Kasir Penjualan</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
</head>
<body>
<?php
        session_start();
        if ($_SESSION['status']!="login") {
            header("location:../index.php?pesan=belum_login");
        }
        include '../koneksi.php';
    ?>
<div class="col-md-10 col-md-offset-1">

<?php
$id=$_GET['id'];
$penjualan = mysqli_query($koneksi,"SELECT penjualan.*, user.username FROM penjualan JOIN user ON penjualan.user_id = user.user_id WHERE penjualan.id_jual='$id'");
while ($t = mysqli_fetch_array($penjualan)) {
?>

<center><h2>STRUK PENJUALAN</h2></center>

<br><br>

<table class="table">
<tr><th>ID Penjualan</th><th>:</th><th><?= $t['id_jual'] ?></th></tr>
<tr><th>Tanggal</th><th>:</th><th><?= $t['tgl_jual'] ?></th></tr>
<tr><th>Kasir</th><th>:</th><th><?= $t['username'] ?></th></tr>
</table>

<table class="table table-bordered">
<tr>
    <th>No</th><th>Nama Barang</th><th>Harga</th>
    <th>Jumlah</th><th>Subtotal</th>
</tr>

<?php
$no = 1;
$detail = mysqli_query($koneksi,"
    SELECT penjualan_detail.*, barang.nama_barang
    FROM penjualan_detail
    JOIN barang ON penjualan_detail.id_barang = barang.id_barang
    WHERE penjualan_detail.id_jual='$id'
");

while ($d = mysqli_fetch_array($detail)) {
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nama_barang'] ?></td>
    <td>Rp. <?= number_format($d['harga']) ?></td>
    <td><?= $d['jumlah'] ?></td>
    <td>Rp. <?= number_format($d['subtotal']) ?></td>
</tr>
<?php } ?>

<tr>
    <th colspan="4" class="text-right">TOTAL</th>
    <th>Rp. <?= number_format($t['total_harga']) ?></th>
</tr>
</table>

<p class="text-center"><i>"Terima Kasih Telah Berbelanja"</i></p>

<?php } ?>

</div>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>
