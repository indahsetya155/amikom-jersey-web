<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idMerek = $_POST['id_merek'];
    $namaMerek = $_POST['nama_merek'];

    if ($namaMerek==""){
    echo "<script> alert('Data Merek Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=edit_merek&id_merek='+'$id_merek';</script>";

}else {
    $queryEdit = mysqli_query($koneksi, "UPDATE tbl_merek SET nama_merek='$namaMerek' WHERE id_merek='$idMerek'");


    if ($queryEdit) {
        echo "<script>alert('Data Merek Berhasil Diubah');window.location='$admin_url'+'adminweb.php?module=merek';</script>";
    } else {
       echo "<script>alert('Data Merek Gagal Diubah'); window.location='$admin_url'+'adminweb.php?module=edit_merek&id_merek='+'$id_merek' ;</script>";
    }
    
  }
}
?>