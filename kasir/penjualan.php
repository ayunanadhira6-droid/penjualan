<?php
include 'header.php';
?>
<div class="container">
    <div class ="panel">
        <div class="panel-heading">
            <h4>Data Penjualan</h4>
</div>
<div class="panel-body">
    <a href="penjualan_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
    <br><br>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>ID Jual</th>
            <th>Tanggal</th>
            <th>Kasir</th>
            <th>Total Harga</th>
            <th>OPSI</th>
        </tr>
<?php
include '../koneksi.php';
$data = mysqli_query($koneksi, "SELECT penjualan.*, user.user_nama FROM penjualan JOIN user ON penjualan.user_id = user.user_id");
$no=1;
while ($d=mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['id_jual']; ?></td>
        <td><?php echo $d['tgl_jual']; ?></td>
        <td><?php echo $d['user_nama']; ?></td>
        <td><?php echo $d['total_harga']; ?></td>
        <td>
            <a href="penjualan_detail.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-sm btn-warning">detail</a>
            <a href="penjualan_invoice.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-sm btn-info">Invoice</a>
        </td>
    </tr>
<?php
}
?>
</table>
</div>
</div>