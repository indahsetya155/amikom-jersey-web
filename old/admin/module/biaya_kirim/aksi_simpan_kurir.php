<?php 
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

// untuk menangkap variabel 'namaMerek' yang dikirim oleh form_tambah.php
$nama_kurir = $_POST['nama_kurir'] ;

// query untuk menyimapn tabel ke tabel tbl_merek
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_kurir (nama_kurir) VALUES ('$nama_kurir')");
if ($nama_kurir==""){
    echo "<script> alert('Data Kurir Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_kurir';</script>";

}else {

if ($querySimpan) {
    echo "<script> alert('Data Kurir Berhasil Masuk'); window.location='$admin_url'+'adminweb.php?module=kurir';</script>";
} else {
    echo "<script> alert('Data Kurir Gagal Dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_kurir';</script>";
}

}

?>