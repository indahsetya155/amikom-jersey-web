<?php 
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

// untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
$namaKategori = $_POST['namaKategori'];

$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_kategori (nama_kategori) VALUES ('$namaKategori')");
if ($namaKategori==""){
    echo "<script> alert('Data Kategori Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_kategori';</script>";

}else {
	if ($querySimpan) {
    echo "<script> alert('Data Kategori Berhasil Masuk'); window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
} else {
    echo "<script> alert('Data Kategori Gagal Dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_kategori';</script>";
}
}

// jike query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori



?>