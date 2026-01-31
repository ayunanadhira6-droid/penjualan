<?php
include 'header.php';
include '../koneksi.php';
?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Tambah Barang</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="barang.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br><br>
                <form method="POST" action="barang_aksi.php">
                        <div class="form-group">
                            <label>Barang</label>
                            <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang" required="required">
                        </div>
                        <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="text" name="harga_beli" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" name="harga_jual" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" required="required">
                        </div>
                    </table>      
                    <input type="submit" class="btn btn-primary" value="Simpan"></input>
                </form>              
                </div>
            </div>
        </div>
    </div>