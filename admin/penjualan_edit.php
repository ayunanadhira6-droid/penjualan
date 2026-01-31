<?php 
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit Penjualan</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="penjualan.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br><br>

                <?php
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"SELECT * FROM penjualan WHERE id_jual='$id'");
                while($d = mysqli_fetch_array($data)){
                ?>
                
                <form method="POST" action="penjualan_update.php">
                    <input type="hidden" name="id_jual" value="<?php echo $d['id_jual']; ?>">

                    <div class="form-group">
                        <label>Tanggal Penjualan</label>
                        <input type="date" name="tgl_jual" class="form-control" required
                               value="<?php echo $d['tgl_jual']; ?>">
                    </div>

                    <!-- total_harga tidak diedit, hanya dikirim ulang -->
                    <input type="hidden" name="total_harga" value="<?php echo $d['total_harga']; ?>">

                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>

                <?php } ?>
            </div>
        </div>
    </div>
</div>
