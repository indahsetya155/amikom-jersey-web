<?php 
session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKategori = $_POST['id_kategori'];
    $namaKategori = $_POST['nama_kategori'];

    if ($namaKategori==""){
    echo "<script> alert('Data kategori Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=edit_kategori&id_kategori='+'$id_kategori';</script>";

}else {
    $queryEdit = mysqli_query($koneksi, "UPDATE tbl_kategori SET nama_kategori='$namaKategori' WHERE id_kategori='$idKategori'");


    if ($queryEdit) {
        echo "<script>alert('Data kategori Berhasil Diubah');window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
    } else {
       echo "<script>alert('Data kategori Gagal Diubah'); window.location='$admin_url'+'adminweb.php?module=edit_kategori&id_kategori='+'$id_kategori' ;</script>";
    }
    
  }
}
?>