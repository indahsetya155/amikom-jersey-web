<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
	echo "<center>Untuk mengakses modul, Anda harus login<br>";
	echo "<a href =../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	$idKategori = $_POST['idKategori'];
	$idMerek = $_POST['idMerek'];
	$namaProduk = $_POST['namaProduk'];
	$deskripsi = $_POST['deskripsiProduk'];
	$hargaProduk = $_POST['hargaProduk'];
	$slide = $_POST['slide'];
	$rekomendasi = $_POST['rekomendasi'];
	$path = "../../upload/" . $nama_file;

	
					if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
						if($ukuran_file <= 1000000){
							if(move_uploaded_file($tmp_file, $path)){
								$querySimpan = mysqli_query($koneksi,"INSERT INTO tbl_produk(id_kategori_produk, id_merek, nama_produk, deskripsi, harga, gambar, slide, rekomendasi) VALUES ('$idKategori','$idMerek','$namaProduk','$deskripsi','$hargaProduk','$nama_file','$slide','$rekomendasi')");
								if($querySimpan){
									echo"
								<script>
									alert('Data Produk Berhasil Masuk'); 
									window.location = '$admin_url'+'adminweb.php?module=produk';
								</script>"; 
								} else {
									echo "
									<script>
									alert('Data Produk Gagal Masuk'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';
									</script>";
								}
						} else {
							echo "<script> alert('Data Gambar Produk Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';
							</script>";
						}
					} else {
						echo "<script> 
						alert('Data Gambar Produk Gagal Dimasukkan Karena Ukuran Melebihi 1 MB'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';
						</script>";
					}
				} else {
					echo "<script> alert('Data Gambar Produk Gagal Dimasukkan Karena Tidak Berektensi JPG/JPEG/PNG'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';
					</script>";
				}
			}
		

?>