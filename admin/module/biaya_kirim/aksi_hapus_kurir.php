<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_kurir = $_GET['id_kurir'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_kurir WHERE id_kurir='$id_kurir'");
    if ($queryHapus) {
        echo "<script>alert('Data Kota Berhasil Dihapus');window.location='$admin_url'+'adminweb.php?module=kurir';</script>";
    } else {
       echo "<script>alert('Data Kota Gagal Dihapus');window.location='$admin_url'+'adminweb.php?module=kurir';</script>";
    }
    
  }
?>