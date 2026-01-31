<?php
include 'header.php';
?>
<div class="container">
    <div class ="panel">
        <div class="panel-heading">
            <h4>Data Barang Penjualan</h4>
</div>
<div class="panel-body">
    <a href="barang_tambah.php" class="btn btn-sm btn-info pull-right">Tambah Barang</a>
    <br><br>
    <table class="table table-bordered table-striped">
        <tr>
            <th width="1%">No</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th width="17%">OPSI</th>
</tr>
<?php
include '../koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM barang");
$no=1;
while ($d=mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['id_barang']; ?></td>
        <td><?php echo $d['nama_barang']; ?></td>
        <td><?php echo $d['harga_beli']; ?></td>
        <td><?php echo $d['harga_jual'];?></td>
        <td><?php echo $d['stok'];?></td>
        <td>
            <a href="barang_invoice.php?id=<?php echo $d['id_barang']; ?>" target="_blank" class="btn btn-sm btn-warning">invoice</a>
            <a href="barang_edit.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-sm btn-info">Edit</a>
            <a href="barang_hapus.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-sm btn-danger">Hapus</a>
        </td>
    </tr>
<?php
}
?>
</table>
</div>
</div>