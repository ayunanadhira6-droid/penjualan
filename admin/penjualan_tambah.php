<?php
include 'header.php';
include '../koneksi.php';
?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Tambah Penjualan</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-10 col-md-offset-1">
                <a href="penjualan.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br><br>

                <form method="POST" action="penjualan_aksi.php">

                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" name="tgl_jual" class="form-control" required>
                    </div>

                    <hr>

                    <h4>Data Barang</h4>

                    <table class="table table-bordered">
                        <tr>
                            <th>Barang</th>
                            <th width="20%">Jumlah</th>
                        </tr>

                        <?php
                        $barang = mysqli_query($koneksi, "SELECT * FROM barang");
                        while($b = mysqli_fetch_array($barang)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $b['nama_barang']; ?>
                                <input type="hidden" name="id_barang[]" value="<?php echo $b['id_barang']; ?>">
                            </td>
                            <td>
                                <input type="number" name="jumlah[]" class="form-control" min="0" value="0">
                            </td>
                        </tr>
                        <?php 
                        } 
                        ?>
                    </table>

                    <input type="submit" class="btn btn-primary" value="Simpan Transaksi">

                </form>

            </div>
        </div>
    </div>
</div>
