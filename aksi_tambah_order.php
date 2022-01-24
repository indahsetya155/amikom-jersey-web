<?php
session_start();
$sid = session_id();
include "lib/koneksi.php";
$id_pro = $_GET['id_order'];

// untuk tambah  
mysqli_query($koneksi, "UPDATE tbl_order SET jumlah = jumlah+1 WHERE id_order='$id_pro'");
header('location:keranjang.php');
