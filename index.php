<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Penjualan</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
    <script type="text/javascript" src="asset/js/jquery.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.js"></script>
</head>
<body style="background: #f0f0f0;">
    <br><br><br>
    <center>
        <h2>SISTEM PENJUALAN<br> REKAYASA PERANGKAT LUNAK SMKN 3 KENDAL</h2>
    </center>
<br><br>
<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <?php
             if (isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "<div class='alert alert-danger'>login gagal! username atau password salah!</div>";
                }elseif($_GET['pesan'] == "logout"){
                    echo "<div class='alert alert-danger'>Anda telah berhasil logout!</div>";
                }elseif($_GET['pesan'] == "belum_login"){
                    echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman selanjutnya!</div>";
             }
        }
        ?>
<form method="post" action="login.php">
    <div class="panel">
        <br>
        <div class="panel-body">
            <div class="form-group">
                <label> Usename </label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label> password </label>
                <input type="password" name="password" class="form-control">
            </div>
            
            <input type="submit" value="Log in" class="btn btn-primary">
            
        </div>
        <br>
    </div>
</form>
</div>
</div>

</body>
</html>