<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_kurir = $_POST['id_kurir'];
    $nama_kurir = $_POST['nama_kurir'];
    if ($nama_kurir==""){
    echo "<script> alert('Data kurir Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=edit_kurir&id_kurir='+'$id_kurir';</script>";

}else {
    $queryEdit = mysqli_query($koneksi, "UPDATE tbl_kurir SET nama_kurir='$nama_kurir' WHERE id_kurir='$id_kurir'");


    if ($queryEdit) {
        echo "<script>alert('Data Kota Berhasil Diubah');window.location='$admin_url'+'adminweb.php?module=kurir';</script>";
    } else {
       echo "<script>alert('Data Kota Gagal Diubah');window.location='$admin_url'+'adminweb.php?module=edit_kurir&id_kurir='+'$id_kurir';</script>";
    }
    }
  }
?>