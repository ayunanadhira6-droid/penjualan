<?php
include 'header.php';
?>
<div class="container">
<div class="panel">
    <div class="panel-heading">
        <?php
        if(isset($_GET['dari']) && isset($_GET['sampai'])){
            $dari = $_GET['dari'];
            $sampai = $_GET['sampai'];
            echo "<h4>Data Laporan Penjualan Dari <b>$dari</b> Sampai <b>$sampai</b></h4>";
        } else {
            echo "<h4>Data Laporan Penjualan</h4>";
        }
        ?>
    </div>
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
    <br>

        <p><center><i>"Terima Kasih Telah Berbelanja"</i></center></p>
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>