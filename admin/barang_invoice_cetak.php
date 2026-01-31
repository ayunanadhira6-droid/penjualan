<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penjualan</title>
     <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
    <script type="text/javascript" src="../asset/js/jquery.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.js"></script>
</head>
<body>
     <?php
        session_start();
        if ($_SESSION['status']!="login") {
            header("location:../index.php?pesan=belum_login");
        }
        include '../koneksi.php';
    ?>

    <div class="col-md-10 col-md-offset-1">
        <?php
        $id=$_GET['id'];

        $transaksi = mysqli_query($koneksi, "select * from barang WHERE id_barang='$id'");
    while ($t=mysqli_fetch_array($transaksi)){
        ?>
        <center>
            <h2>STRUK BARANG</h2>
    </center>
    <br><br>
    <br><br>

    <table class="table">
        <tr>
            <th width="20%">ID Barang</th>
            <th> : </th>
            <th><?php echo $t['id_barang'];?></th>
    </tr>
    <tr>
            <th width="20%">Nama Barang</th>
            <th> : </th>
            <th><?php echo $t['nama_barang'];?></th>
    </tr>
    <tr>
            <th>Harga Beli</th>
            <th> : </th>
            <th><?php echo "RP." .number_format($t['harga_beli']);?></th>
    </tr>
    <tr>
            <th>Harga Jual </th>
            <th> : </th>
            <th><?php echo "RP." .number_format($t['harga_jual']);?></th>
    </tr>
    <tr>
            <th>Stok</th>
            <th> : </th>
            <th><?php echo $t['stok'];?></th>
    </tr>
    </table>
    <br>
    <br>
    <p><center><i> "Terima Kasih Atas Kepercayaan Anda"</i></center></p>
    <?php
    }
    ?>
</div>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>