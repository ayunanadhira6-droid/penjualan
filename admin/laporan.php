<?php
include 'header.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Filter Laporan</h4>
        </div>
        <div class="panel-body">
            <form action="laporan.php" method="get">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Dari tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th width="1%">OPSI</th>
                    </tr>
                    <tr>
                        <td>
                           
                            <input type="date" name="tgl_dari" class="form-control">
                        </td>
                        <td>
                            
                            <input type="date" name="tgl_sampai" class="form-control">
                        </td>
                        <td>
                            <br>
                            <input type="submit" class="btn btn-primary" value="filter">
                        </td>
                   </tr>
                </table>
            </form>
        </div>
    </div>
<br>

<?php
if(isset($_GET['tgl_dari'])&& isset($_GET['tgl_sampai'])){
    $dari = $_GET['tgl_dari'];
    $sampai = $_GET['tgl_sampai'];
?>
<div class="panel">
    <div class="panel-heading">
        <h4> Data Laporan Laundry Dari<b><?php echo $dari;?></b>Sampai<b><?php echo $sampai;?></b></h4>
    </div>
    <div class="panel-body">
    <a target="_blank" href="cetak_print.php?dari=<?php echo $dari;?>&sampai=<?php echo $sampai;?>" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i>Cetak</a>
    <br>
    <br>
        <table class="table table-bordered table table-striped">
         <tr>
            <th>No</th>
            <th>ID Jual</th>
            <th>Tanggal</th>
            <th>Kasir</th>
            <th>Total Harga</th>
        </tr>
        <?php
        include '../koneksi.php';
        $data =  mysqli_query($koneksi,"select * from user, penjualan where user.user_id=penjualan.user_id and date(tgl_jual) > '$dari' and date(tgl_jual) < '$sampai' order by id_jual desc");
        $no=1;
        while ($d=mysqli_fetch_array($data)){
    ?>
    <tr>
        <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['id_jual']; ?></td>
        <td><?php echo $d['tgl_jual']; ?></td>
        <td><?php echo $d['user_nama']; ?></td>
        <td><?php echo $d['total_harga']; ?></td>
    </tr>
<?php
}
?>
        </table>
    </div>
</div>
<?php
}
?>