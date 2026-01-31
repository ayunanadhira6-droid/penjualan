<?php
include 'header.php';
?>
<div class="container">
    <div class ="panel">
        <div class="panel-heading">
            <h4>Data User</h4>
</div>
<div class="panel-body">
    <a href="user_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
    <br><br>
    <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>OPSI</th>
                </tr>
<?php
include '../koneksi.php';
$data = mysqli_query($koneksi, "select * from user");
$no=1;
while ($d=mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['username']; ?></td>
        <td><?php echo $d['user_nama']; ?></td>
        <td>
        <?php
            if ($d['user_status']=='1'){
                echo "<div class='label label-success'>Admin</div>";
            }elseif ($d['user_status']=='2'){
                echo"<div class='label label-info'>User</div>";
            }
        ?>
        </td>
        <td>
            <a href="user_edit.php?id=<?php echo $d['user_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="user_hapus.php?id=<?php echo $d['user_id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
        </td>
    </tr>
<?php
}
?>
</table>
</div>
</div>