<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Penjualan</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
    <script type="text/javascript" src="../asset/js/jquery.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.js"></script>
</head>
<body style="background: #f0f0f0">
   <?php
    session_start();

    // Cek apakah user sudah login
    if(!isset($_SESSION['user_status'])){
    header("location:../login.php?pesan=belum_login");
    exit;
    }

    // Cek apakah user adalah admin (status 1)
    if($_SESSION['user_status'] != 1){
    header("location:../kasir/index.php?pesan=bukan_admin");
    exit;
    }
    ?>


    <nav class="navbar navbar-inverse" style="border-radius: 0px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">                    
                    <span class="sr-only"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>

            <div class="navbar navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class=" "><a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>

                    <li><a href="user.php"><i class="glyphicon glyphicon-user"></i> User</a></li>

                    <li><a href="barang.php"><i class="glyphicon glyphicon-random"></i> Barang</a></li>

                    <li><a href="penjualan.php"><i class="glyphicon glyphicon-list-alt"></i> Penjualan</a></li>

                    <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>