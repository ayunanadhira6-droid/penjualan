<?php
include 'header.php';
include '../koneksi.php';

// Cek login dan status user
if(!isset($_SESSION['user_status'])){
header("location:../login.php");
exit;
}


// Hanya user dengan status 2 yang boleh masuk halaman user
if($_SESSION['user_status'] != 2){
header("location:../admin/index.php");
exit;
}
?>

<div class="container">
    <div class="alert alert-info text-center">
        <h4 style="margin-bottom: 0px;"> <b>Sistem Informasi Penjualan RPL Skanega</b></h4>
    </div>
    <div class="panel">
<div class="panel-heading">
    <h4>Data Pinjaman saya</h4>
</div>
<div class="panel-body">
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Nama Kendaraan</th>
            <th>Tipe</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>OPSI</th>
        </tr>

<?php
$id = $_SESSION['user_id'];
$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM pinjam,kendaraan WHERE pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor AND pinjam.user_id='$id' ORDER BY pinjam_id DESC");
while ($d=mysqli_fetch_array($data)){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['kendaraan_nama']; ?></td>
        <td><?php echo $d['kendaraan_tipe']; ?></td>
        <td><?php echo $d['tgl_pinjam']; ?></td>
        <td><?php echo $d['tgl_kembali']; ?></td>
        <td>
    <?php
    if ($d['pinjam_status']=='1'){
        echo "<div class='label label-success'>TERSEDIA</div>";
    }elseif ($d['pinjam_status']=='2'){
        echo"<div class='label label-danger'>DIPINJAM</div>";
    }
    ?>
        </td>
        <td>
            <a href="invoice.php?id=<?php echo $d['pinjam_id']; ?>" class="btn btn-sm btn-warning">invoice</a>
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