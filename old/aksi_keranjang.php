<?php
session_start();
$sid = session_id();
include "lib/koneksi.php";
$id_pro = $_GET['id_produk'];
$h = $_GET['harga'];
$tgl_skarang = date('Y-m-d');

// keranjang dalam keadaan kosong 
// untuk negecek keranjang dalam keadaan kosong, berdasarkan produk yang dipilih

$sql = mysqli_query($koneksi, "SELECT id_produk FROM tbl_order WHERE id_produk ='$id_pro' AND id_session='$sid' AND tgl_order='$tgl_skarang'");
$ketemu = mysqli_num_rows($sql);

if($ketemu==0){
	mysqli_query($koneksi, "INSERT INTO tbl_order (status_order, id_produk, jumlah, harga, id_session, tgl_order) 
		VALUES ('p','$id_pro',1,'$h','$sid','$tgl_skarang')");
}else {
	mysqli_query($koneksi, "UPDATE tbl_order SET jumlah = jumlah+1 WHERE id_session='$sid' AND id_produk='$id_pro' AND tgl_order='$tgl_skarang'");
}
header('location:keranjang.php');
?>