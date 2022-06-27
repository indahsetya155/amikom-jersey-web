<?php
session_start();
$sid = session_id();
include "lib/koneksi.php";
$id_pro = $_GET['id_order'];

// untuk menghapus id product pada 
mysqli_query($koneksi, "DELETE FROM tbl_order WHERE id_order ='$id_pro'");
header('location:keranjang.php');
?>