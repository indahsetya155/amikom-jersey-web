<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKategori = $_GET['id_kategori'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_kategori WHERE id_kategori='$idKategori'");
    if ($queryHapus) {
        echo "<script>alert('Data Kategori Berhasil Dihapus');window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
    } else {
       echo "<script>alert('Data Kategori Gagal Dihapus');window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
    }
    
  }
?>