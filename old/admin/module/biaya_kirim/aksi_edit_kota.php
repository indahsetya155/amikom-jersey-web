<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_kota = $_POST['id_kota'];
    $nama_kota = $_POST['nama_kota'];
    if ($nama_kota==""){
    echo "<script> alert('Data Kota Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=edit_kota&id_kota='+'$id_kota';</script>";

}else {
    $queryEdit = mysqli_query($koneksi, "UPDATE tbl_kota SET nama_kota='$nama_kota' WHERE id_kota='$id_kota'");


    if ($queryEdit) {
        echo "<script>alert('Data Kota Berhasil Diubah');window.location='$admin_url'+'adminweb.php?module=kota';</script>";
    } else {
       echo "<script>alert('Data Kota Gagal Diubah');window.location='$admin_url'+'adminweb.php?module=edit_kota&id_kota='+'$id_kota';</script>";
    }
}    
  }
?>