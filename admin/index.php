<?php
include 'header.php';
include '../koneksi.php';

// Cek login
if(!isset($_SESSION['user_status'])){
header("location:../login.php");
exit;
}

// Hanya admin (status = 1) yang boleh masuk
if($_SESSION['user_status'] != 1){
header("location:../kasir/index.php");
exit;
}
?>

<div class="container">
    <div class="alert alert-info text-center">
        <h4 style="margin-bottom: 0px;"> <b>Sistem Admin Penjualan</b></h4>
    </div>
<div class="panel">
    <div class="panel-heading">
        <h4>Dashboard</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>
                            <i class="glyphicon glyphicon-shopping-cart"></i>
                            <span class="pull-right">
                                <?php
                                     $barang=mysqli_query($koneksi, "select *from barang");
                                     echo mysqli_num_rows($barang);
                                ?>
                                </span>
                        </h1>
                        Jumlah Barang
                    </div>
                </div>
            </div>

             <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h1>
                            <i class="glyphicon glyphicon-ok-circle"></i>
                            <span class="pull-right">
                                <?php
                                     $penjualan=mysqli_query($koneksi, "select *from penjualan");
                                     echo mysqli_num_rows($penjualan);
                                ?>
                                </span>
                        </h1>
                        Banyaknya Penjualan
                    </div>
                </div>
            </div>
</div>
</div>
</div>
    <div class="panel">
<div class="panel-heading">
    <h4>Riwayat Data Penjualan</h4>
</div>
<div class="panel-body">
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
            <a href="penjualan_invoice.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-sm btn-info">Invoice</a>
        </td>
    </tr>
<?php
}
?>

    </table>
</div>
</div>
</div>

        </div>