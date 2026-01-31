<?php
session_start();

Include 'koneksi.php';
$username=$_POST['username'];
$password=md5($_POST['password']);

$data=mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");

$cek=mysqli_num_rows($data);

if($cek > 0){
    $d = mysqli_fetch_assoc($data);

    $_SESSION['user_id'] = $d['user_id'];
    $_SESSION['user_status'] = $d['user_status'];

    if($d['user_status'] == 1){
        header("location:admin/index.php");
    }else if($d['user_status'] == 2){
        header("location:kasir/index.php");
    }
}else{
    echo "Login gagal!";
}

?>