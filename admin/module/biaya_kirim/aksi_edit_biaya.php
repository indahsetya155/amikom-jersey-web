<?php 
session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_biaya_kirim = $_POST['id_biaya_kirim'];
    $id_kota = $_POST['id_kota'];
    $id_kurir = $_POST['id_kurir'];
    $biaya = $_POST['biaya'];

    $queryEdit = mysqli_query($koneksi, "UPDATE tbl_biaya_kirim SET id_kota='$id_kota',id_kurir
        ='$id_kurir', biaya='$biaya' WHERE id_biaya_kirim='$id_biaya_kirim'");


    if ($queryEdit) {
        echo "<script>alert('Data Biaya Kirim Berhasil Diubah');window.location='$admin_url'+'adminweb.php?module=biaya';</script>";
    } else {
       echo "<script>alert('Data Biaya Kirim Gagal Diubah'); window.location='$admin_url'+'adminweb.php?module=edit_biaya&id_biaya='+'$id_biaya_kirim ;</script>";
  }
}
?>