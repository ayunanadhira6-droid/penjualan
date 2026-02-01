<?php
include '../koneksi.php';
session_start();

// ambil data utama
$tanggal_jual = $_POST['tgl_jual'];
$user_id      = $_SESSION['user_id'];
$id_barang    = $_POST['id_barang'];
$jumlah       = $_POST['jumlah'];

$total_harga = 0;

/* ===============================
   1. HITUNG TOTAL + CEK STOK
================================ */
for($i=0; $i<count($id_barang); $i++){
    if($jumlah[$i] > 0){

        $q = mysqli_query($koneksi, "
            SELECT harga_jual, stok 
            FROM barang 
            WHERE id_barang='$id_barang[$i]'
        ");
        $b = mysqli_fetch_array($q);

        // CEK STOK
        if($b['stok'] < $jumlah[$i]){
            echo "Stok barang tidak mencukupi!";
            exit;
        }

        $subtotal = $b['harga_jual'] * $jumlah[$i];
        $total_harga += $subtotal;
    }
}

/* ===============================
   2. SIMPAN KE PENJUALAN
================================ */
mysqli_query($koneksi, "
    INSERT INTO penjualan (tgl_jual, total_harga, user_id)
    VALUES ('$tanggal_jual', '$total_harga', '$user_id')
");

$id_jual = mysqli_insert_id($koneksi);

/* ===============================
   3. SIMPAN DETAIL + KURANGI STOK
================================ */
for($i=0; $i<count($id_barang); $i++){
    if($jumlah[$i] > 0){

        $q = mysqli_query($koneksi, "
            SELECT harga_jual 
            FROM barang 
            WHERE id_barang='$id_barang[$i]'
        ");
        $b = mysqli_fetch_array($q);

        $harga    = $b['harga_jual'];
        $subtotal = $harga * $jumlah[$i];

        // simpan detail
        mysqli_query($koneksi, "
            INSERT INTO penjualan_detail
            (id_jual, id_barang, jumlah, harga, subtotal)
            VALUES
            ('$id_jual', '$id_barang[$i]', '$jumlah[$i]', '$harga', '$subtotal')
        ");

        // kurangi stok (AMAN)
        mysqli_query($koneksi, "
            UPDATE barang 
            SET stok = stok - $jumlah[$i]
            WHERE id_barang = '$id_barang[$i]'
        ");
    }
}

header("location:index.php");
?>
