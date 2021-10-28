<?php 
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

// untuk menangkap variabel 'namaMerek' yang dikirim oleh form_tambah.php
$nama_kota = $_POST['nama_kota'] ;

// query untuk menyimapn tabel ke tabel tbl_merek
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_kota (nama_kota) VALUES ('$nama_kota')");
if ($nama_kota==""){
    echo "<script> alert('Data kota Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_kota';</script>";

}else {

if ($querySimpan) {
    echo "<script> alert('Data Kota Berhasil Masuk'); window.location='$admin_url'+'adminweb.php?module=kota';</script>";
} else {
    echo "<script> alert('Data Kota Gagal Dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_kota';</script>";
}

}

?>