<?php
include 'header.php';
include '../koneksi.php';

$id = $_GET['id']; // id_jual
?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Detail Penjualan</h4>
        </div>

        <div class="panel-body">
            <a href="penjualan.php" class="btn btn-sm btn-danger">Kembali</a>
            <br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>

                <?php
                $data = mysqli_query($koneksi, "SELECT penjualan_detail.*, barang.nama_barang FROM penjualan_detail JOIN barang ON penjualan_detail.id_barang = barang.id_barang WHERE penjualan_detail.id_jual = '$id'");
                $no = 1;
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama_barang']; ?></td>
                    <td><?php echo $d['harga']; ?></td>
                    <td><?php echo $d['jumlah']; ?></td>
                    <td><?php echo $d['subtotal']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
