<?php 
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

// untuk menangkap variabel 'namaMerek' yang dikirim oleh form_tambah.php
$namaMerek = $_POST['namaMerek'] ;

// query untuk menyimapn tabel ke tabel tbl_merek
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_merek (nama_merek) VALUES ('$namaMerek')");
if ($namaMerek==""){
    echo "<script> alert('Data Merek Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_merek';</script>";

}else {

if ($querySimpan) {
    echo "<script> alert('Data Merek Berhasil Masuk'); window.location='$admin_url'+'adminweb.php?module=merek';</script>";
} else {
    echo "<script> alert('Data Merek Gagal Dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_merek';</script>";
}

}

?>