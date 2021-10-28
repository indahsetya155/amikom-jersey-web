<?php 
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

// untuk menangkap variabel 'namaMerek' yang dikirim oleh form_tambah.php
$id_kota = $_POST['id_kota'] ;
$id_kurir = $_POST['id_kurir'] ;
$biaya = $_POST['biaya'] ;
// query untuk menyimapn tabel ke tabel tbl_merek
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_biaya_kirim (id_kota, id_kurir, biaya) VALUES ('$id_kota','$id_kurir','$biaya')");

if ($querySimpan) {
    echo "<script> alert('Data Biaya Berhasil Masuk'); window.location='$admin_url'+'adminweb.php?module=biaya';</script>";
} else {
    echo "<script> alert('Data Biaya Gagal Dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_biaya';</script>";
}


?>