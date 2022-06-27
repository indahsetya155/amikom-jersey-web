<?php
include "lib/koneksi.php";
include "lib/config.php";

$username = $_POST['username'];
$password = ($_POST['password']);

$queryLogin = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE username='$username' AND password='$password'");
$resultQuery = mysqli_num_rows($queryLogin);

$result = mysqli_fetch_array($queryLogin);

if($resultQuery==1){
	session_start();
	$_SESSION['idMember'] = $result['id_member'];
	header('location:profil.php');

}else {
	echo "<script> alert('username Atau password Tidak valid'); window.location='$base_url'+'login.php';</script>";

}
?>