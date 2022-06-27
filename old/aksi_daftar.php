<?php
Include "lib/koneksi.php";
Include "lib/config.php";

$username = $_POST['username'];
$password = $_POST['password'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];
$id_kota = $_POST['id_kota'];
$email = $_POST['email'];
$hp = $_POST['hp'];

$queryCekUsername = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE username = '$username'");
$jmlUsername = mysqli_num_rows($queryCekUsername);

if($jmlUsername>0){
   echo"<script> alert('Username Sudah digunakan, Silahkan Gunakan Username yang lain'); window.location = '$base_url'+'daftar.php';</script>";
}else {

$queryDaftar = mysqli_query($koneksi, "INSERT INTO tbl_member (username, password, nama, alamat, id_kota, email, no_hp) VALUES ('$username', '$password', '$namalengkap', '$alamat', '$id_kota', '$email', '$hp')");


if($queryDaftar){
	echo "<script> alert('Data Registrasi Berhasil Masuk'); window.location ='$base_url'+'index.php';</script>";
}else{
	echo "<script> alert('Data Registrasi Gagal Masuk'); window.location ='$base_url'+'daftar.php';</script>";
}
}

?>